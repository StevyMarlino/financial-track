<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UseraddRequest;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::query()->select('*')->get()
        ];

        return view('dashboard.admin.listUser',$data);
    }

    /**
     *Save User a newly created resource in storage.
     *
     * @param UseraddRequest $request
     * @return RedirectResponse
     */

    public function store(UseraddRequest $request) {

        $dataArray      =       array(
            "name"          =>          $request->name,
            "last_name"     =>          $request->last_name,
            "email"         =>          $request->email,
            "role"          =>          $request->role,
            "phone"         =>          $request->phone,
            "password"      =>          bcrypt($request->password),
        );

        User::create($dataArray);

            return back()->with("message", "Success! Registration completed");

    }
}
