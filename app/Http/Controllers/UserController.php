<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    public function index(){
        if (Auth::check()) {
            switch(Auth::user()->role){
                case 'admin' : return view('pages.admin.profile')->with(['user' => Auth::user()]); break;
                case 'manager' : return view('pages.manager.profile')->with(['user' => Auth::user()]); break;
                default : return view('pages.user.profile')->with(['user' => Auth::user()]); break;
            }
        }
        return view('layout');
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'new_password' => 'min:5|confirmed',
            'new_password_confirmation' => 'min:5'
        ]);
        $input = $request->all();
        if($request->input('new_password')){
            $input['password'] = bcrypt($request->input('new_password'));
        }
        $user->fill($input)->save();
        Flash::success('Your information successfully updated!');

        return Redirect::action('UserController@index');
    }

}
