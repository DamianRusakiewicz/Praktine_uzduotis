<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogUserRegistration implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserRegistered $event)
    {
        Log::channel('user_registration')->info('New user registered', [
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'email' => $event->user->email,
            'timestamp' => now()->toDateTimeString(),
        ]);
    }
}
