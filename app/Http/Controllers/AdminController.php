<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UseraddRequest;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.listUser', ['users' => User::all()]);
    }

    /**
     *Save User a newly created resource in storage.
     *
     * @param UseraddRequest $request
     * @return RedirectResponse
     */

    public function store(UseraddRequest $request)
    {
        User::create([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "role" => $request->role,
            "phone" => $request->phone,
            "password" => bcrypt($request->password)
        ]);

        return back()->with("message", "The Registration completed");

    }


    /**
     * Show the form for editing the specified user.
     *
     * @param user $user
     * @return void
     */
    public function edit($id)
    {
        // $user = user::find($id);
        // dd($user);
        // return view('user-edit', compact('user'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $users)
    {
        $user = user::find($id);
        dd($user);
        return view('user-update', compact('user'));
         $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        // $user = user::find($id);
        $users->update();
        // $user->update($request->all(), $user);
        return redirect()->route('UserUpdate')->with("message","user updated successfully");
    }

    /**
     *  Remove user.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect()->back()->with('message','User deleted successfully');
    }
}
