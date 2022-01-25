<?php

namespace Modules\Language\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSetLangMiddleware
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
        if (session()->has('admin_lang')) {
            app()->setLocale(session()->get('admin_lang'));
        } else {
            app()->setLocale('default');
        }

        return $next($request);
    }
}
