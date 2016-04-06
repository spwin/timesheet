<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'day';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'status', 'approved', 'week_id', 'user_id', 'date_approved', 'submitted', 'date_submitted', 'cancelled', 'date_cancelled',
    ];

    public function week(){
        return $this->hasOne('App\Week', 'id', 'week_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
