<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*') && !Auth::guard('admin')->check()) {
                return route('loginView'); // Redirect only to admin login
            }

            if ($request->is('customer/*') && !Auth::guard('customer')->check()) {
                return route('index'); // Redirect only to customer login
            }
        }
    }
}
