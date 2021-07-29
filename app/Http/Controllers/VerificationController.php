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
        //je recupere les domaines verifier dans notre database
        $all_domain_verify = Domain::domain_verify();

        $info = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices())
        ];

        $data = [];

        foreach ($all_domain_verify as $domain) {
            $data[] = $domain->invoice_id;
        }

        return view('dashboard.accountant.invoices',$info, ['tableauInvoices' => Api::getInvoices(), 'domains' => $data]);

    }



    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function details($id)
    {

        $invoicesDetails = Api::invoice_detail($id);

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()),
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show the details for the invoice ' . $id,
            'data' => $invoicesDetails
        ];

        Log::info($data);


        return view('dashboard.accountant.details',$data, ['detail' => $invoicesDetails]);
    }
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function domain_exist($id)
    {

        $domain_want_to_verify = Api::invoice_detail($id);

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
