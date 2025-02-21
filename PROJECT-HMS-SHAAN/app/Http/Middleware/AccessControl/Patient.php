<?php

namespace App\Http\Middleware\AccessControl;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!Auth::check()) {
        //     return redirect('/login')->with('error', 'Please log in to access this page.');
        // }
        if (auth()->user()->isPatient()) {
            return $next($request);
        }
        return redirect('/504')->with('error', 'You do not have permission to access this page.');
    }
}
