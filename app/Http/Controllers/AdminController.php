<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\UseraddRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

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
        $user = User::create([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "role" => $request->role,
            "phone" => $request->phone,
            "password" => bcrypt($request->password)
        ]);

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'The User are successfully created ',
            'data' => $user,
            'ip' => $_SERVER['REMOTE_ADDR']
        ];

        Log::info($data);
        return back()->with("message", "The User are successfully Created");

    }


    /**
     * Update information user.
     *
     * @param UserUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request)
    {
        $user = user::find($request->id);
        $user->name = ($request['name']);
        $user->last_name = ($request['last_name']);
        $user->email = ($request['email']);
        $user->phone = ($request['phone']);

        $user->save();

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'The User are successfully Updated ',
            'data' => $user,
            'ip' => $_SERVER['REMOTE_ADDR']
        ];

        Log::info($data);
        return redirect()->back()->with("message", "User information updated successfully");
    }

    /**
     *  Remove user.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(int $id)
    {
        $user = user::find($id);
        $user->delete();

        $data = ['user' => auth()->user()->name,
            'role' => auth()->user()->isRole(),
            'Action' => 'The User are successfully deleted ',
            'data' => $user,
            'ip' => $_SERVER['REMOTE_ADDR']
        ];

        Log::info($data);
        return redirect(route('user.index'))->with('message', 'User deleted successfully');
    }
}
