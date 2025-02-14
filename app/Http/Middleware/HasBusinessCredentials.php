<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasBusinessCredentials
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->businessCredentials) {
            return redirect()->route('business.setup')
                ->with('error', 'Please complete your business profile setup to access this page.');
        }

        return $next($request);
    }
} 