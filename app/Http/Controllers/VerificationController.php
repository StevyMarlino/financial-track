<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Utils\ApiStatus;
use App\Utils\Api;
use App\Utils\ApiConst;

class VerificationController extends Controller
{
    // //
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function verify(Request $request){

       //je recupère les gars qui ont buy, et après en fonction de l'ID de la facture, je sais ce que j'ai à faire
        $ilsOntbuy = self::getInvoices();
       
        
        return view('dashboard.accountant.invoices',['tableauInvoices' => $ilsOntbuy]);
        

    }

    // la fonction ci c'est pour recupérer les invoices d'un utilisateurs

    public static function getInvoices(){

        $invoices = array(
            'call' => 'getInvoices',
        );
        $invoices = Api::addApiAccess($invoices);
        $getInvoices = Api::requestApi($invoices, ApiConst::url);

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
        for( $i=0; $i<count($getInvoices['invoices']); $i++ ){
            if($getInvoices['invoices'][$i]['status'] =='Paid'){
                $lesGarsQuiOntBuy[] = $getInvoices['invoices'][$i];  
            }
        }
        //a ce niveau j'ai déjà les invoices des gars qui ont buy
        return $lesGarsQuiOntBuy;
    }
  

    public function details($id){   
       
        $invoicesDetails = array(
                'id' => $id,
                'call' => 'getInvoiceDetails',
                );

                $invoicesDetails = Api::addApiAccess($invoicesDetails);
                $getinvoicesDetails = Api::requestApi($invoicesDetails, ApiConst::url);
                
                return view('dashboard.accountant.details',['detail' => $getinvoicesDetails]);

    }
}
