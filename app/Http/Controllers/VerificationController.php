<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Utils\Api;
use App\Utils\ApiConst;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

/**
 * Class VerificationController
 * @package App\Http\Controllers
 */
class VerificationController extends Controller
{

    /**
     * VerificationController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:accountant,admin']);
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function verify()
    {
        //je recupère les gars qui ont buy, et après en fonction de l'ID de la facture, je sais ce que j'ai à faire
        $ilsOntbuy = $this->getInvoices();

        return view('dashboard.accountant.invoices', ['tableauInvoices' => $ilsOntbuy]);

    }

    // la fonction ci c'est pour recupérer les invoices d'un utilisateurs

    /**
     * @return array|JsonResponse
     */
    private function getInvoices()
    {

        $invoices = array(
            'call' => 'getInvoices',
            'list' => 'paid'
        );

        $getInvoices = $this->connect($invoices);

        // il peut toujours avoir un truc qui peut se passer en route. donc... je verifie un truc avant!
        if (!isset($getInvoices['success']) || !$getInvoices['success']) {
            $data = [
                'success' => $getInvoices['success'],
                'status' => 'denied',
                'message' => "An error occured. Please try again later.",
            ];
            //en principe on doit créer un vu d'érreur ici. mais pour l'instant je fais d'abord ca.
            return response()->json($data);
        }


        //a ce niveau j'ai déjà les invoices des gars qui ont buy
        return $getInvoices;
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function details($id)
    {

        $invoicesDetails = $this->invoice_detail($id);
        $all_domain_not_verify = Domain::all()->where('verify', false);


        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show the details for the invoice ' . $id,
            'data' => $invoicesDetails
        ];

        Log::info($data);

        return view('dashboard.accountant.details', ['detail' => $invoicesDetails, 'domains' => $all_domain_not_verify]);
    }

    /**
     * @param $query
     * @return array|bool|string
     */
    private function connect($query)
    {
        return Api::requestApi(Api::addApiAccess($query), ApiConst::url);
    }

    /**
     * @param $id
     * @return array|bool|string
     */
    private function invoice_detail($id)
    {
        $invoicesDetails = array(
            'id' => $id,
            'call' => 'getInvoiceDetails',
        );

        return $this->connect($invoicesDetails);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function domain_exist($id)
    {

        $domain_want_to_verify = $this->invoice_detail($id);

        $ma_chaine = "";
        foreach ($domain_want_to_verify['invoice']['items'] as $item) {
            $ma_chaine = strtolower($item['description']);
        }

        $verify = $this->mark_as_verify($ma_chaine, $id);

        if ($verify) {
            return redirect()->back()->with('message', 'Le Domaine a été marqué comme vérifier');
        }

        return redirect()->back()->with('error', 'Le Domaine n\'a pas encore été enregistré veuillez contacter le Support Cloudhost ');

    }

    /**
     * function qui s occupe de marquer un domaine comme verifier
     * @param $string
     * @param $id
     * @return bool
     */
    private function mark_as_verify($string, $id): bool
    {
        if (!$this->is_already_mark($string)) {
            $all_domain_not_verify = Domain::all()->where('verify', false);

            foreach ($all_domain_not_verify as $domain) {
                if (str_contains($string, $domain->name_host)) {
                    $update_domain = Domain::find($domain->id);
                    $update_domain->verify = true;
                    $update_domain->invoice_id = $id;
                    $update_domain->save();

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * on verifier si le domaine a déjà été marquer comme vérifier
     * @param $string
     * @return bool
     */
    private function is_already_mark($string): bool
    {
        $all_domain_verify = Domain::all()->where('verify', true);

        foreach ($all_domain_verify as $domain) {
            if (str_contains($string, $domain->name_host)) {
                return true;
            }
        }

        return false;
    }
}
