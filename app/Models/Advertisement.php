<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','advertisement_id')->orderBy('created_at','desc');
    }

    public function get_last_advert(){
        $result = $this->where('published',1)
            ->whereNotIn('status',['blocked','top'])
            ->orderBy('created_at','desc')
            ->has('category')
            ->take(10)
            ->get();

        return $result;
    }

    public function get_top_advert(){
        $result = $this->where('published',1)
            ->where('status','top')
            ->orderBy('created_at','desc')
            ->has('category')
            ->take(10)
            ->get();

        return $result;
    }

    public function get_popular_advert(){
        $result = $this->where('published',1)
            ->whereNotIn('status',['blocked','top'])
            ->orderBy('read','desc')
            ->has('category')
            ->take(10)
            ->get();

        return $result;
    }
}
