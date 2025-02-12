<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // echo "Patient Check";

        // if(true){
        //     return redirect()->route('login');
        //     // return $next($request);
        // }else{
        //     return $next($request);
        // }
        echo "Patient Check";
        return $next($request);
    }
}
