<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WeeksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:weeks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new week';

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
        $begin_date = date('Y-m-d', time());
        $end_date = date('Y-m-d', strtotime('sunday this week'));
        DB::table('week')
            ->where('current', 1)
            ->update(array('current' => 0));
        DB::table('week')->insert([
            'current' => 1,
            'begin_date' => $begin_date,
            'end_date' => $end_date,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        $this->info('New week successfully created!');
    }
}
