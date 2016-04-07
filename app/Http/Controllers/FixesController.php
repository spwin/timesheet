<?php

namespace App\Http\Controllers;

use App\Day;
use App\Fixes;
use App\User;
use App\Week;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class FixesController extends Controller
{
    public function index(){
        $weeks = Week::with('days')->where(['approved' => 0])->orderBy('begin_date', 'DESC')->get();
        return view('pages.manager.fixes.index')->with([
            'weeks' => $weeks
        ]);
    }

    public function create($week_id){
        $week = Week::findOrFail($week_id);
        $users = User::select(DB::raw('CONCAT(surname, " ", name) as full_name, id'))->where(['role' => 'user'])->orderBy('surname', 'ASC')->lists('full_name', 'id');
        return view('pages.manager.fixes.create')->with([
            'week' => $week,
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $input = $request->all();
        $week = Week::findOrFail($input['week_id']);
        $fix = new Fixes();
        $fix->fill($input);
        $fix->save();
        Flash::success(trans('messages.fix-added'));
        return Redirect::action('FixesController@weekly', $week->id);
    }

    public function weekly($id){
        $week = Week::findOrFail($id);
        $fixes = Fixes::with('week')->where(['week_id' => $id])->get();
        return view('pages.manager.fixes.list')->with([
            'fixes' => $fixes,
            'week' => $week,
        ]);
    }

    public function managerUsers($user_id){
        $user = User::findOrFail($user_id);
        $week_filter = Input::has('week') ? Input::get('week') : '';
        $fixes = Fixes::where(['fixes.user_id' => $user->id])->join('week', 'fixes.week_id', '=', 'week.id')->where(['week.approved' => 0])->get();
        $weeks = Week::where(($week_filter ? ['id' => $week_filter] : []) + ['approved' => 0])->get();
        return view('pages.manager.fixes.manager_by_users')->with([
            'fixes' => $fixes,
            'user' => $user,
            'weeks' => $weeks
        ]);
    }

    public function edit($id){
        $fix = Fixes::findOrFail($id);
        $users = User::select(DB::raw('CONCAT(surname, " ", name) as full_name, id'))->where(['role' => 'user'])->orderBy('surname', 'ASC')->lists('full_name', 'id');
        return view('pages.manager.fixes.edit')->with([
            'fix' => $fix,
            'users' => $users
        ]);
    }

    public function update($id, Request $request){
        $input = $request->all();
        $fix = Fixes::findOrFail($id);
        $fix->fill($input);
        $fix->save();
        Flash::success(trans('messages.fix-updated'));
        return Redirect::action('FixesController@weekly', $fix->week_id);
    }
}