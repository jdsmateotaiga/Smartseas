<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Helper;

class Task extends Model
{
    //
    public function user() {
        return $this->hasOne('App\User', 'id', 'partner_id');
    }

    public function remarks() {
      return $this->hasMany('App\Remark');
    }

    public function project() {
      return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function budget_code() {
      return $this->hasOne('App\BudgetCode', 'id', 'code_id');
    }

    public function unit_of_measurement() {
      return $this->hasOne('App\UnitMeasurement', 'id', 'unit_measurement');
    }

    public function activity() {
      return $this->hasOne('App\Activity', 'id', 'activity_id');
    }


    protected $guarded = array();
    protected $table = 'tasks';

}
