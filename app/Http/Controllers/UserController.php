<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainStoreRequest;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:user,admin']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DomainStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DomainStoreRequest $request)
    {

        $domain = new Domain();

        $domain['name_customer'] = $request['name_customer'];
        $domain['name_host'] = strtolower($request['name_host']);
        $domain['price'] = $request['price'];
        $domain['service'] = $request['service'];
        $domain['method_payment'] = $request['method_payment'];
        $domain['user_id'] = auth()->user()->getAuthIdentifier();

        $domain->save();

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'The domain are successfully added by ' . auth()->user()->name ,
            'data' => $domain
            ];

        Log::info($data);

        return redirect()->back()->with('message','Domain stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        // récuperation des domaines de l utilisateur connecté
        $domain = Domain::selectDomainUser(auth()->user()->getAuthIdentifier());

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show a domain for the auth user'];

        Log::info($data);

        return view('dashboard.user.show',['domain' => $domain]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

}
