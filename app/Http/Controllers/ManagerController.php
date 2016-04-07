<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class ManagerController extends Controller
{
    public function index(){
        return view('pages.managers.index')->with([
            'managers' => User::where(['role' => 'manager'])->get()
        ]);
    }

    public function create(){
        return view('pages.managers.create');
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
        $input['role'] = 'manager';
        User::create($input);
        Flash::success(trans('messages.manager-added'));
        return Redirect::action('ManagerController@index');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('pages.managers.edit')->with([
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

        Flash::success(trans('messages.manager-updated'));

        return Redirect::action('ManagerController@index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        Flash::error(trans('messages.manager-deleted'));
        $user->delete();

        return Redirect::action('ManagerController@index');
    }
}
