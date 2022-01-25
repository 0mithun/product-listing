<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCommingSoonMode
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
        if(session()->has('commingsoon_mode') && session('commingsoon_mode') == 1){
            return response()->view('errors.commingsoon');
        }

        return $next($request);
    }
}
