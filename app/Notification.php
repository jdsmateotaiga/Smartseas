<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    protected $guarded = array();
    protected $table = 'notifications';
}
