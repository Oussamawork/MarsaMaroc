<?php

namespace App\Http\Middleware;

use Closure;

class AllwaysRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->path() == 'register') {
            return redirect('/login');
        }
        if ($request->path() == '/') {
            return redirect('/login');
        }
        return $next($request);
    }
}
