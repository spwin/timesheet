<?php

namespace App\Http\Controllers;

use App\Day;
use App\User;
use App\Week;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    public function index(){
        return view('pages.users.index')->with([
            'users' => User::where(['role' => 'user'])->get()
        ]);
    }

    public function create(){
        return view('pages.users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|alpha_num|min:3|max:32',
            'surname' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'min:5'
        ]);
        $input = $request->all();
        if($request->input('password')){
            $input['password'] = bcrypt($request->input('password'));
        }
        $input['role'] = 'user';
        $user = User::create($input);
        $today = date('Y-m-d', time());
        $week = Week::where(['current' => 1])->first();
        $day = [
            'date' => $today,
            'status' => 'none',
            'approved' => 0,
            'week_id' => $week->id,
            'user_id' => $user->id,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];
        Day::create($day);
        Mail::send('auth.emails.'.$user->language.'.user_create', ['user' => $user, 'pass' => $request->input('password'), 'url' => URL::to('/')], function ($m) use ($user) {
            $m->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
            $m->to($user->email, $user->name.' '.$user->surname)->subject(trans('emails.timesheet-login-details', [], [], $user->language));
        });
        Flash::success(trans('messages.user-added'));
        return Redirect::action('UsersController@index');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('pages.users.edit')->with([
            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|alpha_num|min:3|max:32',
            'surname' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' => 'min:5|confirmed',
            'password_confirmation' => 'min:5'
        ]);
        $input = $request->all();
        if($request->input('password')){
            $input['password'] = bcrypt($request->input('password'));
        }
        $user->fill($input)->save();

        Flash::success(trans('messages.user-updated'));

        return Redirect::action('UsersController@index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        Flash::error(trans('messages.user-deleted'));
        $user->delete();

        return Redirect::action('UsersController@index');
    }
}
