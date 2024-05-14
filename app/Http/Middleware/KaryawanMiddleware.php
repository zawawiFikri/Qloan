<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class KaryawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->roles == "karyawan") {
                return $next($request);
            }else{
                return redirect('/dashboard/karyawan')->with('message', 'access denied');
            }
        }else{
            return redirect('/login')->with('message', 'Login sebagai karyawan untuk melakukan access');
        }
        return $next($request);
    }
}
