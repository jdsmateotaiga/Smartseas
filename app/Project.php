<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function activities() {
        return $this->hasMany('App\Activity');
    }

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function outcomes() {
        return $this->hasMany('App\Outcome');
    }

    public function outcome() {
        return $this->hasOne('App\Outcome');
    }

    public function outputs() {
        return $this->hasMany('App\Output');
    }


    protected $guarded = array();
    protected $table = 'projects';

}
