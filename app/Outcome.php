<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    //
    public function activities() {
        return $this->hasMany('App\Activity');
    }

    public function outputs() {
        return $this->hasMany('App\Output');
    }

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function project() {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    protected $guarded = array();
    protected $table = 'outcomes';
}
