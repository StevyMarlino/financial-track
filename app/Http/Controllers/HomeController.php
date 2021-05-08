<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserUpdateSecurityRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Response;
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
        $this->middleware(['auth','role:user,accountant,admin']);
    }

    /**
     * Show the application index.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('dashboard.index');
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

        $user->name = (is_null($request['name'])? $user->name : $request['name'] );
        $user->last_name = (is_null($request['last_name'])? $user->last_name : $request['last_name'] );
        $user->email = (is_null($request['email'])? $user->email : $request['email'] );
        $user->phone = (is_null($request['phone'])? $user->phone : $request['phone'] );

        $user->save();


        return redirect()->back()->with('message','updated information');

    }

    /**
     * @param UserUpdateSecurityRequest $request
     * @return Application|ResponseFactory|Response
     *
     */
    public function updateSecurityInformation(UserUpdateSecurityRequest $request)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());
        // Check Password
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'BAD CURRENT PASSWORD',
            ], 401);
        }




    }

}
