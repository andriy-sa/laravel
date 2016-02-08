<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Advertisement;
use App\Sa\Slug;
use Auth;
use Config;
use Validator;
use JsValidator;
use Illuminate\Support\Facades\Input;
use Checker;

class AdvertisementController extends Controller
{
    public $rules = [
        'title'       => 'required|min:5|max:255',
        'description' => 'required',
        'category'    => 'required|numeric',
    ];

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

    public function advertisement($local,$category,$url) {

        $advertisement = Advertisement::where('published',1)->where('url',$url)->first();
        if(!$advertisement) abort(404);

       // dd(Checker::test());

        $advertisement->increment('read');

        return view('site.advertisements.node')
            ->with('advertisement',$advertisement);
    }

    public function create(){

        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();

        $categories_select = Category::lists(Config::get('app.locale').'_title','id');
        $validtor = JsValidator::make($this->rules);

        $title = trans('message.new_advert');
        return view('site.advertisements.create')
            ->with('categories',$categories)
            ->with('categories_select',$categories_select)
            ->with('validator',$validtor)
            ->with('title',$title);
    }

    public function post_create(){
        $input = Input::all();
        $validator = Validator::make($input,$this->rules);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->all())->withInput();
        }

        $advertisement = new Advertisement();
        $advertisement->title       = $input['title'];
        $advertisement->category_id = $input['category'];
        $advertisement->description = $input['description'];
        $advertisement->user_id     = Auth::user()->id;
        $advertisement->save();

        $slug = Slug::make($advertisement->id.'-'.$advertisement->title);
        $advertisement->url = $slug;
        $advertisement->save();
        $category = Category::select('url')->where('id',$advertisement->category_id)->first()->url;

        return redirect()
            ->route('advertisement',['locale'=>Config::get('app.locale'),'category'=>$category,'url'=>$slug])
            ->with('success',trans('advertisement_add'));
    }
}
