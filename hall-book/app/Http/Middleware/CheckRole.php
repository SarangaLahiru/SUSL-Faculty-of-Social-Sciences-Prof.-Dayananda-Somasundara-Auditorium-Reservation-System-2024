<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::guard('admin')->check() || Auth::guard('admin')->user()->role !== $role) {
            // Redirect or show an error
            // return redirect()->route('admin.login')->withErrors(['email' => 'Unauthorized.']);
            return redirect('/');
        }

        return $next($request);
    }
}