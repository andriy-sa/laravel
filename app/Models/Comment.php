<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function advertisement(){
        return $this->belongsTo('App\Models\Advertisement','advertisement_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
