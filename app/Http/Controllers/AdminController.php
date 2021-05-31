<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::query()->select('*')->paginate(5)
        ];

        return view('dashboard.admin.listUser',$data);
    }
}
