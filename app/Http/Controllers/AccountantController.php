<?php

namespace App\Http\Controllers;

use App\Utils\Api;
use App\Models\User;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class AccountantController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:user,accountant,admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        $domains = User::all();

        $data = [
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all User',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.list', ['lists' => $domains]);
    }

    /**
     * Show view for all the domain registered.
     *
     * @return Application|Factory|View
     */
    public function showAll()
    {
        $domains = Domain::selectUserAddDomain();

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()) ,
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.show',$data ,['domains' => $domains]);
    }

    /**
     * show view for all the domain Starter
     *
     * @return void
     */
    public function showStarter()
    {
        $domains = Domain::selectStarterDomain();

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()) ,
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.starter',$data ,['domains' => $domains]);
    }

    /**
     * show view for all the domain Business
     *
     * @return void
     */
    public function showBusiness()
    {
        $domains = Domain::selectBusinessDomain();

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()) ,
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.business',$data ,['domains' => $domains]);
    }

    /**
     * show view for all the domain Premium
     *
     * @return void
     */
    public function showPremium()
    {
        $domains = Domain::selectPremiumDomain();

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()) ,
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.premium',$data ,['domains' => $domains]);
    }

    /**
     * show view for all the domain Ultimate
     *
     * @return void
     */
    public function showUltimate()
    {
        $domains = Domain::selectUltimateDomain();

        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_paid' => count(Api::getInvoices()) ,
            'user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.ultimate',$data ,['domains' => $domains]);
    }

    /**
     * show view for all the domain prevision
     *
     * @return void
     */
    public function Prevision()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
