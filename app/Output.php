<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    //
    public function activities() {
        return $this->hasMany('App\Activity');
    }

    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function project() {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function outcome() {
        return $this->hasOne('App\Outcome', 'id', 'outcome_id');
    }

    public function output_report() {
      return $this->hasMany('App\ProgressReportOutput');
    }

    protected $guarded = array();
    protected $table = 'outputs';
}
