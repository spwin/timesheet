<?php

namespace App\Console\Commands;

use App\Settings;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class UsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send users mails';

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
        if($settings->value == 'enabled') {
            $users = User::where(['role' => 'user'])->get();
            foreach ($users as $user) {
                Mail::send('auth.emails.' . $user->language . '.users_sunday', ['user' => $user], function ($m) use ($user) {
                    $m->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
                    $m->to($user->email, $user->name . ' ' . $user->surname)->subject(trans('emails.subject-users-weekly', [], [], $user->language));
                });
            }
            $this->info('Mails successfully sended!');
        } else {
            $this->info('Mails are disabled!');
        }
    }
}
