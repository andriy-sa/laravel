<?php

namespace App\Sa;

use Auth;
use App\Models\Comment;
use App\Models\Advertisement;

class Checker {

    public function test(){
        return Auth::user()->name;
    }
}