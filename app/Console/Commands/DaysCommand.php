<?php

namespace App\Console\Commands;

use App\Day;
use App\User;
use App\Week;
use Illuminate\Console\Command;

class DaysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new day for every user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date('Y-m-d', time());
        $week = Week::where(['current' => 1])->first();
        $users = User::where(['role' => 'user'])->get();
        foreach($users as $user){
            $day = new Day();
            $day->fill(array(
                'date' => $today,
                'status' => 'none',
                'approved' => 0,
                'week_id' => $week->id,
                'user_id' => $user->id
            ));
            $day->save();
        }
    }
}
