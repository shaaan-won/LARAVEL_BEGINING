<?php

namespace App\Http\Middleware\DoubleAccessControl;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( auth()->user()->isSuperAdmin() || auth()->user()->isAdmin()) {
            return $next($request);
        }
        
        // abort(403, 'Unauthorized');
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
