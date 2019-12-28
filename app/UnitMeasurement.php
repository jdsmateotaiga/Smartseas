<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitMeasurement extends Model
{
    //
    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function get_owner() {
        return $this->owner()->first();
    }
}
