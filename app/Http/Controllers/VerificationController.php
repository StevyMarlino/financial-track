<?php

namespace App\Http\Controllers;

use App\Utils\Api;
use App\Utils\ApiConst;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     * @param Request $request
     * @return Application|Factory|View
     */
    public function verify(Request $request)
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

        $lesGarsQuiOntBuy = [];
        for ($i = 0; $i < count($getInvoices['invoices']); $i++) {
            if ($getInvoices['invoices'][$i]['status'] == 'Paid') {
                $lesGarsQuiOntBuy[] = $getInvoices['invoices'][$i];
            }
        }
        //a ce niveau j'ai déjà les invoices des gars qui ont buy
        return $lesGarsQuiOntBuy;
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function details($id)
    {
        $invoicesDetails = array(
            'id' => $id,
            'call' => 'getInvoiceDetails',
        );

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show the details for the invoice ' . $id,
            'data' => $this->connect($invoicesDetails)
        ];

        Log::info($data);

        return view('dashboard.accountant.details', ['detail' => $this->connect($invoicesDetails)]);
    }

    /**
     * @param $query
     * @return array|bool|string
     */
    private function connect($query)
    {
        return Api::requestApi(Api::addApiAccess($query), ApiConst::url);
    }
}
