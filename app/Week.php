<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'week';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'approved', 'begin_date', 'end_date', 'current',
    ];

    public function days(){
        return $this->hasMany('App\Day', 'week_id');
    }

    public function fixes(){
        return $this->hasMany('App\Fixes', 'week_id', 'id');
    }
}
