<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    //

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function get_tasks() {
        return $this->tasks()->get();
    }

    protected $guarded = array();
    protected $table = 'sprints';

}
