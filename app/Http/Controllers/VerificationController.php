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
        $this->is_due_date();
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function verify()
    {
        //je recupere les domaines verifer dans notre database
        $all_domain_verify = Domain::domain_verify();

        $data = [];

        foreach ($all_domain_verify as $domain) {
            $data[] = $domain->invoice_id;
        }

        return view('dashboard.accountant.invoices', ['tableauInvoices' => $this->getInvoices(), 'domains' => $data]);

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

        //a ce niveau j'ai déjà les invoices des gars qui ont buy
        return $this->connect($invoices);
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function details($id)
    {

        $invoicesDetails = $this->invoice_detail($id);

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show the details for the invoice ' . $id,
            'data' => $invoicesDetails
        ];

        Log::info($data);


        return view('dashboard.accountant.details', ['detail' => $invoicesDetails]);
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

        $due_date = $domain_want_to_verify['invoice']['date'];
        $verify = $this->mark_as_verify($ma_chaine, $id, $due_date);

        if ($verify) {
            return redirect()->back()->with('message', 'Le Domaine a été marqué comme vérifier');
        }

        return redirect()->back()->with('error', 'Le Domaine n\'a pas encore été enregistré veuillez contacter le Support Cloudhost ');

    }

    /**
     * function qui s occupe de marquer un domaine comme verifier
     * @param $string
     * @param $id
     * @param $due_date
     * @return bool
     */
    private function mark_as_verify($string, $id, $due_date): bool
    {
        if (!$this->is_already_mark($string)) {
            $all_domain_not_verify = Domain::domain_not_verify();

            foreach ($all_domain_not_verify as $domain) {
                if (str_contains($string, $domain->name_host)) {
                    $update_domain = Domain::find($domain->id);
                    $update_domain->verify = true;
                    $update_domain->invoice_id = $id;
                    $update_domain->due_date = $due_date;
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
        $all_domain_verify = Domain::domain_verify();

        foreach ($all_domain_verify as $domain) {
            if (str_contains($string, $domain->name_host)) {
                return true;
            }
        }

        return false;
    }

    private function is_due_date()
    {
        $all_domain_verify = Domain::domain_verify();

        foreach ($all_domain_verify as $domain) {
            if ($domain->due_date == date('Y-m-d')) {
                $update_verification = Domain::find($domain->id);

                $update_verification->verify = false;
                $update_verification->service = 'RENEW';

                $update_verification->save();
            }
        }
    }
}
