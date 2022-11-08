<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->emtype == 1) {
                return redirect()->route('dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->emtype == 0){
                return redirect()->route('user_dashboard');
            }
        }
        return $next($request);
    }

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         if (Auth::user()->emtype == 1) {
    //             return redirect()->route('dashboard');
    //         } else {
    //             return redirect('/login');
    //         }

    //     } elseif(Auth::guard($guard)->check()){
    //         if (Auth::user()->emtype == 0) {
    //             return redirect()->route('user_dashboard');
    //         } else {
    //             return redirect('/login');
    //         }
    //     } else {
    //         return $next($request);
    //     }
    // }
}
