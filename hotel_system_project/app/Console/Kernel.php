<?php

namespace App\Console;

use App\Console\Commands\SendProfilePictureReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendProfilePictureReminder::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('reminders:profile-picture')->daily();
    }
}

