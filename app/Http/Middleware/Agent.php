<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Agent
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'agent') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
