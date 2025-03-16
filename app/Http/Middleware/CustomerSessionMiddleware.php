<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'customer') {
            return redirect('/'); // Redirect non-customer users
        }

        config(['session.cookie' => 'customer_session']);
        return $next($request);
    }
}