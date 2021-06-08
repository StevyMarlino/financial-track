<?php

namespace App\Http\Controllers;

use App\Http\Requests\UseraddRequest;
use App\Models\User;
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $id->update($request->all());
        return back()->with("message","updated successfully");
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
