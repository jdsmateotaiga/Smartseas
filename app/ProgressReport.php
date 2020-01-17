<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    //
    public function project() {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    

}
