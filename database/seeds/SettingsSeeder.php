<?php

use App\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        //add day fare
        $user = new Settings;
        $user->fill(array(
            'name' => 'day_fare',
            'value' => '115'
        ));
        $user->save();

        //add night fare
        $user = new Settings;
        $user->fill(array(
            'name' => 'night_fare',
            'value' => '155'
        ));
        $user->save();

        //add start_date
        $user = new Settings;
        $user->fill(array(
            'name' => 'start_date',
            'value' => ''
        ));
        $user->save();

        //add email_sending
        $user = new Settings;
        $user->fill(array(
            'name' => 'emails',
            'value' => 'enabled'
        ));
        $user->save();
    }
}
