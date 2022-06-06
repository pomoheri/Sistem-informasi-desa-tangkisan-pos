<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->level_akses == 0){
            return $next($request);
        }else if(auth()->user()->level_akses == 1){
            return $next($request);
        }else if(auth()->user()->level_akses == 2){
            return $next($request);
        }
   
        return redirect('home')->with('error',"Mohon Maaf Anda Tidak Berhak Akses.");
    }
}
