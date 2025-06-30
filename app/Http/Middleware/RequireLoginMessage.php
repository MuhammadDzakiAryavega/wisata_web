<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequireLoginMessage
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('login.form')
                ->with('message', 'Harus login terlebih dahulu');
        }

        return $next($request);
    }
}
