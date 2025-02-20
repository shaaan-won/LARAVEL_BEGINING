<?php

namespace App\Http\Middleware\AccessControl;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
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
        if (auth()->user()->isSuperAdmin()) {
            return $next($request);
        }
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
