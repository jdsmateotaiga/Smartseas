<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function roles() {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function get_role() {
        return $this->roles()->first();
    }

    public function owner() {
      return $this->hasOne('App\User', 'id', 'who_add_user_id');
    }

    public function get_owner() {
      return $this->owner()->first();
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if( $this->roles()->where('name', $role)->first() ) {
            return true;
        }
        return false;
    }

    protected $guarded = array();

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



}
