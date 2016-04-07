<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\DaysCommand::class,
        Commands\WeeksCommand::class,
        Commands\UsersCommand::class,
        Commands\ManagersCommand::class,
        Commands\AdminCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:weeks')
            ->weekly()->mondays()->at('00:01');
        $schedule->command('command:days')
            ->dailyAt('00:02');
        $schedule->command('command:users')
            ->weekly()->sundays()->at('19:00');
        $schedule->command('command:managers')
            ->weekly()->tuesdays()->at('10:00');
        $schedule->command('command:admin')
            ->weekly()->wednesdays()->at('10:00');
    }
}
