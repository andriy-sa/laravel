<?php

namespace App\Sa;

use Auth;
use App\Models\Comment;
use App\Models\Advertisement;

class Checker {

    public function comment_add($adv_id){

        $adv = Advertisement::find($adv_id);
        if(!$adv){
            return false;
        }
        if($adv->status == 'blocked'){
            return false;
        }
        if(!Auth::check()){
            return false;
        }
        if($adv->user_id == Auth::user()->id){
            return false;
        }
        $comments = $adv->comments()->where('user_id',Auth::user()->id)->first();
        if($comments){
            return false;
        }

        return true;
    }

    public function is_my_adv($adv_id){
        $adv = Advertisement::find($adv_id);
        if(!$adv){
            return false;
        }
        if(!Auth::check()){
            return false;
        }
        if($adv->user_id != Auth::user()->id){
            return false;
        }

        return true;
    }
}