<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(strtolower(auth()->user()->role) != 'admin'){
            return back()->with('error', 'You are not allowed to access that page');
        }else{
            return $next($request);
        }
    }
}
