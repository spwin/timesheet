<?php

use App\Day;

class Helper{
    public static function pending(){
        $pending = Day::where(['day.approved' => 0, 'day.cancelled' => 0, 'day.submitted' => 1])->where('day.status', '<>', 'none')->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count();
        return $pending;
    }
}