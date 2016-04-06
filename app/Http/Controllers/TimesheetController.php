<?php

namespace App\Http\Controllers;

use App\Day;
use App\Fixes;
use App\Settings;
use App\Week;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TimesheetController extends Controller
{
    public function users(){
        $weeks_filter = Input::has('week') ? Input::get('week') : '';
        $weeks = Week::with('days')->where(($weeks_filter ? ['id' => $weeks_filter] : []) + ['approved' => 0])->orderBy('begin_date', 'DESC')->get();
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.user.timesheet.timesheet')->with([
            'weeks' => $weeks,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'user' => Auth::user()
        ]);
    }

    public function managersUsers(){
        $users = User::with('days')->where(['role' => 'user'])->orderBy('surname')->get();
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.lists_users')->with([
            'users' => $users,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value
        ]);
    }

    public function managersDays(){
        $days_unique = Day::with('user')->where(['day.submitted' => 1])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0])->orderBy('date', 'DESC')->groupBy('date')->get();
        $days = [];
        $counter = 0;
        foreach($days_unique as $du){
            $days[$counter]['current'] = $du;
            $days[$counter++]['days'] = Day::with('user')->where(['submitted' => 1, 'date' => $du->date])->get();
        }
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.lists_date')->with([
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'days' => $days
        ]);
    }

    public function admin(){
        $weeks = Week::with('days')->orderBy('begin_date', 'DESC')->get();
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.admin.timesheet.timesheet')->with([
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'weeks' => $weeks
        ]);
    }

    public function view($id){
        $users = User::with('days')->where(['role' => 'user'])->orderBy('surname')->get();
        $week = Week::findOrFail($id);
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        $where = ['submitted' => 1, 'week_id' => $id];
        return view('pages.admin.timesheet.view')->with([
            'users' => $users,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'where' => $where,
            'week' => $week
        ]);
    }

    public function byDate(){
        $date = Input::get('date');
        $day = Day::where(['date' => $date])->first();
        $week = Week::findOrFail($day->week_id);
        $first_date = Week::orderBy('id', 'ASC')->first();
        $days = Day::with('user')->where(['date' => $date, 'submitted' => 1])->get();
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.date')->with([
            'week' => $week,
            'single' => $day,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'days' => $days,
            'date' => $date,
            'first_date' => $first_date
        ]);
    }

    public function byDays($id){
        $week = Week::findOrFail($id);
        $days_unique = Day::with('user')->where(['week_id' => $id, 'submitted' => 1])->groupBy('date')->get();
        $days = [];
        $counter = 0;
        foreach($days_unique as $du){
            $days[$counter]['current'] = $du;
            $days[$counter++]['days'] = Day::with('user')->where(['week_id' => $id, 'submitted' => 1, 'date' => $du->date])->get();
        }
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.admin.timesheet.date')->with([
            'week' => $week,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'days' => $days
        ]);
    }

    public function onlyFixes($id){
        $week = Week::findOrFail($id);
        $fixes = Fixes::where(['week_id' => $week->id])->get();
        return view('pages.admin.timesheet.fixes')->with([
            'week' => $week,
            'fixes' => $fixes
        ]);
    }

    public function requestsUsers(){
        $pending = Day::where(['day.approved' => 0, 'day.cancelled' => 0, 'day.submitted' => 1])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count();
        $users = User::where(['role' => 'user'])->get();
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.users')->with([
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'users' => $users,
            'pending' => $pending
        ]);
    }

    public function requestsDays(){
        $days_unique = Day::with('user')->where(['day.submitted' => 1, 'day.cancelled' => 0, 'day.approved' => 0])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->orderBy('date', 'DESC')->groupBy('date')->get();
        $days = [];
        $counter = 0;
        foreach($days_unique as $du){
            $days[$counter]['current'] = $du;
            $days[$counter++]['days'] = Day::with('user')->where(['submitted' => 1, 'cancelled' => 0, 'approved' => 0, 'date' => $du->date])->get();
        }
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.request_date')->with([
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'days' => $days
        ]);
    }

    public function listsUser($id){
        $user = User::findOrFail($id);
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.lists_user')->with([
            'user' => $user,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value
        ]);
    }

    public function requestsUser($id){
        $pending = Day::where(['day.approved' => 0, 'day.cancelled' => 0, 'day.submitted' => 1])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count();
        $user = User::findOrFail($id);
        $day_fare = Settings::select('value')->where(['name' => 'day_fare'])->first();
        $night_fare = Settings::select('value')->where(['name' => 'night_fare'])->first();
        return view('pages.manager.timesheet.requests_user')->with([
            'user' => $user,
            'day_fare' => $day_fare->value,
            'night_fare' => $night_fare->value,
            'pending' => $pending
        ]);
    }
}
