<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserUpdateSecurityRequest;
use App\Models\Domain;
use App\Models\User;
use App\Utils\Api;
use App\Utils\ApiConst;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:user,accountant,admin']);

    }


    /**
     * Show the application index.
     *
     * @return Renderable
     */
    public function index()
    {
        $datas = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_account' => Domain::domainDistinct(),
            'total_user' => Domain::userDistinct(),
            'domain_paid' => count(Api::getInvoices()) ,
        ];

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'User ' . auth()->user()->name . 'is Successfully login'];

        Log::info($data);
        return view('layouts.dashboard', $datas)->with('message', " Welcome " . auth()->user()->name);
    }


    /**
     * Show the application Setting.
     *
     * @return Renderable
     *
     */
    public function settings()
    {
        $data = [
            'sale_of_last_month' => number_format(Domain::sale_of_last_month()),
            'sale_of_current_month' => number_format(Domain::sale_of_current_month()),
            'percent_of_recipes' => number_format(abs(Domain::percent_of_sale()), 2),
            'domain_verify' => count(Domain::domain_verify()),
            'domain_account' => Domain::domainDistinct(),
            'total_user' => Domain::userDistinct(),
            'domain_paid' => count(Api::getInvoices()) ,
        ];
        return view('dashboard.settings',$data);
    }


    /**
     * @param UserUpdateRequest $request
     * @todo make a function to update basic information like first name or last name for the current user
     */
    public function updateBasicInformation(UserUpdateRequest $request)
    {

        $user = User::find(auth()->user()->getAuthIdentifier());

        $user->name = (is_null($request['name']) ? $user->name : $request['name']);
        $user->last_name = (is_null($request['last_name']) ? $user->last_name : $request['last_name']);
        $user->email = (is_null($request['email']) ? $user->email : $request['email']);
        $user->phone = (is_null($request['phone']) ? $user->phone : $request['phone']);

        $user->save();

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'User information are successfully updated',
            'data' => $user

        ];

        Log::info($data);

        return redirect()->back()->with('message', 'Information updated successfully');

    }

    /**
     * @param UserUpdateSecurityRequest $request
     * @return RedirectResponse
     *
     */
    public function updateSecurityInformation(UserUpdateSecurityRequest $request)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());
        // Check Password
        if (!$user || !Hash::check($request['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'Please enter your old password');
        }

        $user->password = bcrypt($request['password']);

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'The User Password of ' . auth()->user()->name . ' are successfully change'];

        Log::info($data);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Password successfully changed Please Re-login');

    }


}
