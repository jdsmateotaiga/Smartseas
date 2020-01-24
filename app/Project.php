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

    public function progress_reports() {
      $query = $this->hasMany('App\ProgressReport');
      if(auth()->user()->hasRole('partner')) {
        return $query->where([
              ['user_id', auth()->user()->id],
              ['active', 1]
            ]);
      } else {
        return $query->where([
              ['submitted', 1],
              ['active', 1]
            ]);
      }
    }

    public function risk_logs($progress_report_id) {
      $query = $this->hasMany('App\RiskLog');
      if(auth()->user()->hasRole('partner')) {
          return $query->where([
              ['active', 1],
              ['progress_report_id', $progress_report_id]
            ])->get();
      } else {
          return $query->where([
              ['active', 1],
              ['progress_report_id', $progress_report_id]
            ])->get();
      }
    }

    public function progress_report_partnership_forged($progress_report_id) {

      $query = $this->hasMany('App\ProgressReportPartnershipForged');
      if(auth()->user()->hasRole('partner')) {
        return $query->where([
              ['progress_report_id', $progress_report_id]
            ])->get();
      } else {
        return $query->where('progress_report_id', $progress_report_id)->get();
      }
    }

    public function progress_report_management($progress_report_id) {
      $query = $this->hasMany('App\ProgressReportManagement');
      if(auth()->user()->hasRole('partner')) {
        return $query->where([
          ['progress_report_id', $progress_report_id]
        ])->get();
      } else {
        return $query->where('progress_report_id', $progress_report_id)->get();
      }
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

    public function user_cost() {
      $new_arr = [];
      foreach( $this->outcomes()->get() as $outcome) {
        $outcome_arr = ['outcome'=>$outcome->id, 'details' => []];
        foreach($outcome->tasks as $task) {
            $month = explode(',', $task->month);
            $collectedData = [];
            foreach($month as $item) {
              $cost = explode('-', $item)[2];
              $user_code = $task->user->partner_code;
              if($cost != '') {
                  array_push($outcome_arr['details'], [
                        'user' => $user_code,
                        'cost' => $cost
                  ]);
              }
            }
        }
        array_push($new_arr, $outcome_arr);
      }
      return $new_arr;
    }

    public function report_user_cost() {
      $new_arr = [];
      foreach($this->user_cost() as $list) {
         $collectedData = [];
         foreach($list['details'] as $item ) {
           if(isset($collectedData[$item['user']]))
               $collectedData[$item['user']] +=  $item['cost'];
            else
               $collectedData += array($item['user'] => $item['cost']);
         }
         array_push($new_arr, $collectedData);
      }
      return $new_arr;
    }


    protected $guarded = array();
    protected $table = 'projects';

}
