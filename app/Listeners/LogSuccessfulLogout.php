<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;
use App\Models\LoginHistory;

class LogSuccessfulLogout
{
    public function handle(Logout $event)
    {
        $user = $event->user;

        // Store logout event in database
        LoginHistory::create([
            'user_id' => $user->id,
            'event' => 'logout',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Log the event
        Log::info("User {$user->id} logged out from IP: " . request()->ip());
    }
}