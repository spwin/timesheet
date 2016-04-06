<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'week_id', 'user_id', 'sum', 'comment'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function week(){
        return $this->hasOne('App\Week', 'id', 'week_id');
    }
}
