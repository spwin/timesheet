<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        //add admin
        $user = new User;
        $user->fill(array(
            'name' => 'Michael',
            'surname' => 'Bleitzer',
            'email' => 'admin@admin.com',
            'password' => bcrypt('london97'),
            'role' => 'admin',
            'active' => 1
        ));
        $user->save();
    }
}
