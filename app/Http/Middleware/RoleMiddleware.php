<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string[]  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // If user is logged in but doesn't have the right role
        if ($user->role === 'user') {
            return redirect('/')->with('error', 'You do not have access to the admin area.');
        }

        return abort(403, 'Unauthorized access.');
    }
}
