<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param array $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $role)
    {

        //Exception Si l'utilisateur n'est pas connecte

        if(!Auth::check())
        {
            abort(403,'Vous devez vous authentifier pour acceder a cette page');
        }

        //Handle Access denied exception if the roles are not in roles array

        if(!in_array(Auth::user()->role, $role))
        {
            abort(403,'Vous n\' avez pas les droits d\'acces a cette page');
        }

        //The request continue
        return $next($request);
    }
}
