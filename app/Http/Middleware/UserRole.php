<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class UserRole {
    public function handle($request, Closure $next, String $role) {
        if (!Auth::check()){ // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/home');
        }

        $user = Auth::user();
        if($user->user_role == $role){
            $userTimezone  = get_auth_user_meta( 'user_timezone' );
            config(['app.timezone' => $userTimezone]);
            //date_default_timezone_set($userTimezone);
            return $next($request);
        }

        return redirect('/home');
    }
}
