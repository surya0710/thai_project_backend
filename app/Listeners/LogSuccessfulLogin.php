<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use App\Models\LoginHistory;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;
        
        // Store login event in database
        LoginHistory::create([
            'user_id' => $user->id,
            'event' => 'login',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Log the event
        Log::info("User {$user->id} logged in from IP: " . request()->ip());
    }
}