<?php

namespace App\Http\Controllers;

use App\Day;
use App\Week;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index(){
        if (Auth::check()) {
            switch(Auth::user()->role){
                case 'admin' : return Redirect::action('TimesheetController@admin'); break;
                case 'manager' : return Redirect::action('TimesheetController@managersUsers', ['type' => 'pending']); break;
                default : return Redirect::action('TimesheetController@users'); break;
            }
        }
        return view('layout');
    }

    public function language($lang){
        Session::set('language', $lang);
        return Redirect::back();
    }

    function getRandom($what){
        $random = [
            'names' => [
                'Melissa',
                'Pauline',
                'Richard',
                'Ausra',
                'Viktorija',
                'Maciek',
                'Deivid',
                'Ilona',
                'Anna',
                'Marlena',
                'Virginija',
            ],
            'surnames' => [
                'J. Roberson',
                'Ramos',
                'Gaskins',
                'Taylor',
                'Kowalski',
                'Makaro',
                'Trybbi',
                'Daopr',
                'Vutowe',
                'Sworil',
                'Perkiy',
                'Appoe',
                'Witrundo',
                'Frankenstain',
                'Muxx',
            ],
            'emails' => [
                'PaulineCRamos@inbound.plus',
                'MelissaJRoberson@inbound.plus',
                'RichardVGaskins@inbound.plus',
                'qwfqwf@inbound.plus',
                'fwwfwffw@inbound.plus',
                'MelissaJRoberson@inbound.plus',
                '23f23f23f23@inbound.plus',
                'MelissaJRqwefqwefoberson@inbound.plus',
                'qefwefwefqf@inbound.plus',
                'ewfqweqwefqwefq@inbound.plus',
                'qwefwef@inbound.plus',
                'wefwefwef@inbound.plus',
                'wefwef@inbound.plus',
                'MelissaJwefwefRoberson@inbound.plus',
            ]
        ];
        return $random[$what][rand ( 0 , count($random[$what]) -1)];
    }

    function addUser($role, $count){
        for($i = 0; $i < $count; $i++){
            $user = new User;
            $user->fill(array(
                'name' => $this->getRandom('names'),
                'surname' => $this->getRandom('surnames'),
                'email' => rand(0, 9999999).$this->getRandom('emails'),
                'password' => bcrypt('london97'),
                'role' => $role,
                'active' => 1,
                'language' => (rand(0,9) > 5 ? 'lt' : 'en')
            ));
            $user->save();
        }
    }

    public function test(){
        $this->addUser('manager', 2);
        $this->addUser('user', 20);
        $current_day = $first_day = '2016-03-07';
        DB::table('week')->delete();
        while($current_day <= date('Y-m-d', time())){
            //echo $current_day.' - '.date('w', strtotime($current_day)).' - '.date('l', strtotime($current_day)).' current sunday on '.date('Y-m-d', strtotime('sunday this week', strtotime($current_day)));
            if(date('w', strtotime($current_day)) == 1){
                $begin_date = date('Y-m-d', strtotime($current_day));
                $end_date = date('Y-m-d', strtotime('sunday this week', strtotime($current_day)));
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
            }
            $today = date($current_day);
            $week = Week::where(['current' => 1])->first();
            $users = User::where(['role' => 'user'])->get();
            foreach($users as $user){
                $day = new Day();
                $submitted = rand(0,9) > 2 ? 1 : 0;
                $approved = $submitted ? ($current_day >= date('Y-m-d', strtotime('Monday last week')) && date('Y-m-d', strtotime('Sunday last week')) ? (rand(0,9) > 7 ? 1 : 0) : 1) : 0;
                $cancelled = !$approved && $submitted ? (rand(0,9) > 6 ? 1 : 0) : 0;
                $day->fill(array(
                    'date' => $today,
                    'approved' => $approved,
                    'submitted' => $submitted,
                    'cancelled' => $cancelled,
                    'status' => $submitted ? (rand(0,9) > 5 ? 'day' : 'night') : 'none',
                    'week_id' => $week->id,
                    'user_id' => $user->id
                ));
                $day->save();
            }
            $current_day = date('Y-m-d', strtotime('+1 day', strtotime($current_day)));
        }
    }
}
