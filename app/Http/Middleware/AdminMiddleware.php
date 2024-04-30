<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->roles == "admin") {
                return $next($request);
            }else{
                return redirect('/admin')->with('message', 'access denied');
            }
        }else{
            return redirect('/login')->with('message', 'Login sebagai admin untuk melakukan access');
        }
        return $next($request);
    }
}
