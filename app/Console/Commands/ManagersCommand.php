<?php

namespace App\Console\Commands;

use App\Day;
use App\Settings;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class ManagersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:managers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send managers mails';

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
        $settings = Settings::where(['name' => 'emails'])->first();
        $pending = Day::where(['day.approved' => 0, 'day.cancelled' => 0, 'day.submitted' => 1])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count();
        if($settings->value == 'enabled' && $pending > 0) {
            $users = User::where(['role' => 'manager'])->get();
            foreach ($users as $user) {
                Mail::send('auth.emails.' . $user->language . '.managers_monday', ['user' => $user], function ($m) use ($user) {
                    $m->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
                    $m->to($user->email, $user->name . ' ' . $user->surname)->subject(trans('emails.subject-managers-weekly', [], [], $user->language));
                });
            }
            $this->info('Mails successfully sended!');
        } else {
            $this->info('Mails are disabled or there are no pending requests!');
        }
    }
}
