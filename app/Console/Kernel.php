<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // 6 ayda bir: filtre değişim hatırlatma
        $schedule->command('reminders:filter')
                 ->cron('0 0 1 */6 *')
                 ->name('filter-reminder')
                 ->withoutOverlapping();

        // Günlük: sistem rapor komutu
        $schedule->command('reports:daily')
                 ->dailyAt('00:00')
                 ->name('daily-report')
                 ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}