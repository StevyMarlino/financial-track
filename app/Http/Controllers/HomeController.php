<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserUpdateSecurityRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('dashboard.index')->with('message', " Welcome ");
    }


    /**
     * Show the application Setting.
     *
     * @return Renderable
     *
     */
    public function settings()
    {
        return view('dashboard.settings');
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

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('message', 'Password successfully changed Please Re-login');

    }

}
