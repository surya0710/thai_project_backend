<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        config(['session.cookie' => 'customer_session']);

        if (!Auth::guard('customer')->check()) {
            if ($request->routeIs('index')) {
                return $next($request);
            }

            return redirect()->route('index');
        }

        return $next($request);
    }
}
