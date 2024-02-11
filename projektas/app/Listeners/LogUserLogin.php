<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogUserLogin implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserLoggedIn $event)
    {
        Log::channel('user_login')->info('User logged in', [
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'email' => $event->user->email,
            'timestamp' => now()->toDateTimeString(),
        ]);
    }
}
