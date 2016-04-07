<?php

namespace App\Http\Controllers;

use App\Week;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class WeekController extends Controller
{
    public function approve($id){
        DB::table('week')
            ->where('id', $id)
            ->update(array('approved' => 1));
        Flash::success(trans('messages.payroll-paid'));
        return Redirect::back();
    }
}
