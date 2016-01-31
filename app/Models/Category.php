<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    public $timestamps = false;

    public function advertisements(){
        $this->hasMany('App\Models\Advertisement','category_id');
    }

    public function get_order_count(){
        $result = $this
            ->leftJoin('advertisements','advertisements.category_id','=','categories.id')
            ->select('categories.*',\DB::raw('COUNT(`advertisements`.`category_id`) AS `adv_count`'))
            ->orderBy('adv_count','desc')
            ->groupBy('categories.id')
            ->get();


        return $result;
    }
}
