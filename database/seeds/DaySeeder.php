<?php

use App\Day;
use App\Week;
use App\User;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day')->delete();

        //add admin
        $today = date('Y-m-d', time());
        $week = Week::where(['current' => 1])->first();
        $users = User::where(['role' => 'user'])->get();

        foreach($users as $user) {
            $day = new Day;
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
