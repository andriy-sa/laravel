<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
         return $this->belongsToMany('App\Models\Role', 'users_roles');
    }

    public function hasRole($check){
        return in_array($check,$this->roles->lists('name')->toArray());
    }

    public function advertisements(){
        return $this->hasMany('App\Models\Advertisement','user_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','user_id');
    }

    public function message_from(){
        return $this->hasMany('App\Models\Message','from_id');
    }
    public function message_to(){
        return $this->hasMany('App\Models\Message','to_id');
    }
}
