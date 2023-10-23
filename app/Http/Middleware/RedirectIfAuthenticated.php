<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('login'); //name of the route to be redirected on successful admin login
            }
            if (Auth::guard($guard)->check()) {
                return redirect('user.login'); //name of the route to be redirected on successful user login
            }
        }

        // if (strpos(url()->current(), 'admin') !== false) {
        //     return redirect()->route('login');
        // } else {
        //     return redirect()->route('user.login');
        // }

        return $next($request);
    }
}
