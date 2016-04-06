<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class DayController extends Controller
{
    public function update($id, Request $request){
        $input = $request->all();
        $day = Day::findOrFail($id);
        if($day->approved){
            return Redirect::action('TimesheetController@users');
        }
        if(!array_key_exists('type', $input)){
            $input['type'] = 'none';
            Flash::warning('You need to select something to submit!');
            return Redirect::action('TimesheetController@users');
        }
        DB::table('day')
            ->where('id', $id)
            ->update(array(
                'submitted' => 1,
                'cancelled' => 0,
                'date_submitted' => date('Y-m-d H:i:s', time()),
                'status' => $input['type']
            ));
        Flash::success('Your time has been submitted!');
        return Redirect::back();
    }

    public function approve($id, Request $request){
        $input = $request->all();
        if(!array_key_exists('type', $input)){
            $input['approved'] = 0;
            $input['type'] = 'none';
            $input['submitted'] = 0;
        } else {
            $input['approved'] = 1;
            $input['submitted'] = 1;
        }
        DB::table('day')
            ->where('id', $id)
            ->update(array(
                'approved' => $input['approved'],
                'date_approved' => date('Y-m-d H:i:s', time()),
                'submitted' => $input['submitted'],
                'cancelled' => 0,
                'status' => $input['type']
            ));
        Flash::success('Record has been approved!');
        return Redirect::back();
    }

    public function destroy($id){
        DB::table('day')
            ->where('id', $id)
            ->update(array(
                'cancelled' => 1,
                'approved' => 0,
                'date_cancelled' => date('Y-m-d H:i:s', time())
            ));

        Flash::error('Record cancelled!');
        return Redirect::back();
    }
}
