<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //this middleware code is used to prevent authenticated users form accessing the login page again
        if ($request->path()=="login" && $request->session()->has('user'))
        return redirect('/');
        return $next($request);
    }
}
