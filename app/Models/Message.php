<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function from(){
        return $this->belongsTo('App\Models\User','from_id');
    }

    public function to(){
        return $this->belongsTo('App\Models\User','to_id');
    }
}
