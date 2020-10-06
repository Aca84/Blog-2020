<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;


        foreach ($guards as $guard) {

            // if (Auth::user()==$guard['admin']) {

            //     return view('/admin');
            // }

            if (Auth::guard($guard)->check()) {
                // return redirect(url('/')); // uvek vraca na index-posts
            }
            
        }

        return $next($request);
    }
}
