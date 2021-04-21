<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public $domain;
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
     * Show the application My Domain.
     *
     * @return Renderable
     * @todo make a function to get all domain for the current user
     */
    public function myDomain()
    {
        $domain = auth()->user()
            ->domain
            ->sortBy('created_at');

        return view('dashboard.show',['domain' => $domain]);
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


    }

    /**
     *@todo make a function to update settings for the current user like password name
     */
    public function updateSecurityInformation()
    {

    }

    public function store()
    {

    }
}
