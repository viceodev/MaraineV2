<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AssignmentMiddleware
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
        $status = auth()->user()->courses;

        if(empty($status) || $status == null){
            return redirect()->route('student.courses.register')->with('error', 'You have to register your courses to be able to get and submit assigments');
        }else{
            return $next($request);
        }
        
    }
}
