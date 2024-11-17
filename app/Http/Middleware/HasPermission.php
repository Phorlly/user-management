<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has the required permission
        $roteName = $request->route()->getName();
        if (accessable($roteName)) {
            return $next($request);
        }

        // Redirect to an error page if permission is denied
        return goToNext('error.404');
    }
}
