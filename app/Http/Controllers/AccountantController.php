<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'Show all Domain Name',
            'ip' => $_SERVER['REMOTE_ADDR']
            ];

        Log::info($data);

        return view('dashboard.accountant.show', ['domains' => $domains]);
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
