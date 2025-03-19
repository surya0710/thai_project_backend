<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        config(['session.cookie' => 'admin_session']);

        if (!Auth::guard('admin')->check()) {
            if ($request->routeIs('loginView')) {
                return $next($request);
            }

            return redirect()->route('loginView');
        }

        if(Auth::guard('admin')->user()->is_deleted === 1 || Auth::guard('admin')->user()->is_blocked === 1){
            Auth::guard('admin')->logout();
            return redirect()->route('loginView');
        }

        return $next($request);
    }
}
