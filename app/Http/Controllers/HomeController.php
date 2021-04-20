<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
     * Show the application My Domain.
     *
     * @return Renderable
     * @todo make a function to get all domain for 
     */
    public function myDomain()
    {
        return view('dashboard.show');
    }

    /**
     * Show the application Setting.
     *
     * @return Renderable
     */
    public function settings()
    {
        return view('dashboard.settings');
    }
}
