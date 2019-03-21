<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * middleware check login admin
     */
    public function handle($request, Closure $next)
    {
//         && Auth::user()->isAdmin()
//        if(Auth::check() && Auth::user()->isAdmin())

        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->admin == '1')
                return $next($request);
        }
        return redirect('home');
    }


}
