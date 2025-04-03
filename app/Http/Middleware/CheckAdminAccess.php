<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is not an admin
        if (Auth::check() && Auth::user()->roles !== 'admin') {
            // Redirect users with 'user' role to the user dashboard
            return redirect()->route('home')->with('error', 'Access denied: Admins only.');
        }

        // Allow admins to proceed
        return $next($request);
    }

}
