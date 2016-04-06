<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersSeeder');
        $this->command->info('Users table seeded!');
        $this->call('SettingsSeeder');
        $this->command->info('Settings table seeded!');
        $this->call('WeekSeeder');
        $this->command->info('Week table seeded!');
        $this->call('DaySeeder');
        $this->command->info('Day table seeded!');
    }
}
