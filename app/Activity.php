<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Activity extends Model
{
    //

    public function project() {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function outcome() {
        return $this->hasOne('App\Outcome', 'id', 'outcome_id');
    }

    public function output() {
        return $this->hasOne('App\Output', 'id', 'output_id');
    }

    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function activity_report($progress_report_id) {
      return $this->hasOne('App\ProgressReportActivity')->where('progress_report_id', $progress_report_id)->first();
    }

    public function tasks() {
      if(count($_GET) != 0) {
        $temp = '';
        $timeline = [];
        foreach($_GET as $item) {
            $temp .= $item . ',';
            array_push($timeline, $item);
        }
        $q = rtrim($temp, ',');
        $eloquent = $this->hasMany('App\Task')->where('timeline', 'LIKE', '%'.$q.'%')->orderBy('id','DESC');
        foreach($timeline as $num) {
           $eloquent->orWhere('timeline', 'LIKE', '%'.$num.'%');
        }
        return $eloquent->distinct();
      } else {
        return $this->hasMany('App\Task');
      }
    }


    public function get_tasks() {
        if(auth()->user()->hasRole('partner')) {
            return $this->tasks()->where('partner_id', auth()->user()->id)->get();
        } else {
            return $this->tasks()->get();
        }
    }

    protected $guarded = array();
    protected $table = 'activities';

}
