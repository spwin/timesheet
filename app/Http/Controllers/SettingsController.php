<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::all();
        return view('pages.admin.settings')->with([
            'settings' => $settings
        ]);
    }

    public function update($id, Request $request){
        $setting = Settings::findOrFail($id);

        $input = $request->all();

        $setting->fill($input)->save();
        Flash::success(trans('messages.settings-updated'));

        return Redirect::action('SettingsController@index');
    }
}
