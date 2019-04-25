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
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next = null, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('admin/home');
            return $next($request);
        } else {
            return redirect('admin/login');
        }


    }
}
