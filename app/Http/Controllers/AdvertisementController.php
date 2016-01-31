<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function index(){
        $categoryModel = new Category();

        $categories = $categoryModel->get_order_count();
        $title = trans('message.all_advert');

        $advertisements = Advertisement::where('published',1)
            ->where('status','!=','top')
            ->orderBy('created_at','desc')
            ->paginate(15);
        $top_advertisements = Advertisement::where('published',1)
            ->where('status','=','top')
            ->orderBy('created_at','desc')
            ->get();

        return view('site.advertisements.index')
            ->with('title',$title)
            ->with('categories',$categories)
            ->with('advertisements',$advertisements)
            ->with('top_advertisements',$top_advertisements);
    }

    public function category($locale,$category){
        $cur_category = Category::where('url',$category)->first();
        if(!$cur_category) abort(404);

        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();
        $title = $cur_category->{$locale.'_title'};

        $advertisements = Advertisement::where('published',1)
            ->where('status','!=','top')
            ->where('category_id',$cur_category->id)
            ->orderBy('created_at','desc')
            ->paginate(15);
        $top_advertisements = Advertisement::where('published',1)
            ->where('status','=','top')
            ->where('category_id',$cur_category->id)
            ->orderBy('created_at','desc')
            ->get();

        return view('site.advertisements.index')
            ->with('title',$title)
            ->with('categories',$categories)
            ->with('advertisements',$advertisements)
            ->with('top_advertisements',$top_advertisements);
    }

    public function create(){
       // dump(app());
        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();

        $title = trans('message.new_advert');
        return view('site.advertisements.create')
            ->with('categories',$categories)
            ->with('title',$title);
    }

    public function post_create(){

    }
}
