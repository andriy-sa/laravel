<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\Comment;
use App\Models\User;
use App\Models\Message;
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

    public function index(Advertisement $advertModel){
        $categoryModel = new Category();

        $categories = $categoryModel->get_order_count();
        $title = trans('message.all_advert');

        $advertisements = Advertisement::where('published',1)
            ->where('status','!=','top')
            ->orderBy('created_at','desc')
            ->has('category')
            ->paginate(15);
        $top_advertisements = Advertisement::where('published',1)
            ->where('status','=','top')
            ->has('category')
            ->orderBy('created_at','desc')
            ->get();

        $b1_baner = Baner::where('type','b1')->get();
        $popular_advert = $advertModel->get_popular_advert();

        return view('site.advertisements.index')
            ->with('title',$title)
            ->with('categories',$categories)
            ->with('advertisements',$advertisements)
            ->with('top_advertisements',$top_advertisements)
            ->with('b1_baner',$b1_baner)
            ->with('popular_advert',$popular_advert);
    }

    public function search(Advertisement $advertModel){
        $q = Input::get('q','');

        $advertisements = Advertisement::where('published',1)
            ->where(function($query) use ($q){
                $query->where('title','like','%'.$q.'%')
                      ->orWhere('description','like','%'.$q.'%');
            })
            ->has('category')
            ->orderBy('created_at','desc')
            ->paginate(15);

        $b1_baner = Baner::where('type','b1')->get();
        $b2_baner = Baner::where('type','b2')->get();

        $latest_advert = $advertModel->get_last_advert();
        $top_advert = $advertModel->get_top_advert();

        return view('site.advertisements.search')
            ->with('advertisements',$advertisements)
            ->with('q',$q)
            ->with('b1_baner',$b1_baner)
            ->with('b2_baner',$b2_baner)
            ->with('latest_advert',$latest_advert)
            ->with('top_advert',$top_advert);

    }

    public function category(Advertisement $advertModel, $locale,$category){
        $cur_category = Category::where('url',$category)->first();
        if(!$cur_category) abort(404);

        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();
        $title = $cur_category->{$locale.'_title'};

        $advertisements = Advertisement::where('published',1)
            ->where('status','!=','top')
            ->where('category_id',$cur_category->id)
            ->orderBy('created_at','desc')
            ->has('category')
            ->paginate(15);
        $top_advertisements = Advertisement::where('published',1)
            ->where('status','=','top')
            ->where('category_id',$cur_category->id)
            ->orderBy('created_at','desc')
            ->has('category')
            ->get();

        $b1_baner = Baner::where('type','b1')->get();
        $popular_advert = $advertModel->get_popular_advert();

        return view('site.advertisements.index')
            ->with('title',$title)
            ->with('categories',$categories)
            ->with('advertisements',$advertisements)
            ->with('top_advertisements',$top_advertisements)
            ->with('b1_baner',$b1_baner)
            ->with('popular_advert',$popular_advert);
    }

    public function advertisement(Advertisement $advertModel,$local,$category,$url) {

        $advertisement = Advertisement::where('published',1)->where('url',$url)->first();
        if(!$advertisement) abort(404);

        $b1_baner = Baner::where('type','b1')->get();
        $b2_baner = Baner::where('type','b2')->get();

        $validator = JsValidator::make(['price' => 'required','text'=>'required']);

        $advertisement->increment('read');

        $latest_advert = $advertModel->get_last_advert();
        $top_advert = $advertModel->get_top_advert();

        return view('site.advertisements.node')
            ->with('advertisement',$advertisement)
            ->with('validator',$validator)
            ->with('b1_baner',$b1_baner)
            ->with('b2_baner',$b2_baner)
            ->with('latest_advert',$latest_advert)
            ->with('top_advert',$top_advert);
    }

    public function create(Advertisement $advertModel){

        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();

        $categories_select = Category::lists(Config::get('app.locale').'_title','id');
        $validtor = JsValidator::make($this->rules);

        $b1_baner = Baner::where('type','b1')->get();
        $popular_advert = $advertModel->get_popular_advert();

        $title = trans('message.new_advert');
        return view('site.advertisements.create')
            ->with('categories',$categories)
            ->with('categories_select',$categories_select)
            ->with('validator',$validtor)
            ->with('title',$title)
            ->with('b1_baner',$b1_baner)
            ->with('popular_advert',$popular_advert);
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
            ->with('success',trans('message.advertisement_add'));
    }

    public function update($locale,$id){
        $advertisement = Advertisement::where('published',1)->where('id',$id)->first();

        if(!$advertisement || Auth::user()->id != $advertisement->user_id) abort(404);

        $categoryModel = new Category();
        $categories = $categoryModel->get_order_count();

        $categories_select = Category::lists(Config::get('app.locale').'_title','id');
        $validtor = JsValidator::make($this->rules);

        $title = trans('message.update').': '.$advertisement->title;
        return view('site.advertisements.update')
            ->with('categories',$categories)
            ->with('categories_select',$categories_select)
            ->with('validator',$validtor)
            ->with('title',$title)
            ->with('advertisement',$advertisement);
    }

    public function post_update($locale,$id){
        $advertisement = Advertisement::where('published',1)->where('id',$id)->first();

        if(!$advertisement || Auth::user()->id != $advertisement->user_id) abort(404);

        $input = Input::all();
        $validator = Validator::make($input,$this->rules);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->all())->withInput();
        }

        $advertisement->title       = $input['title'];
        $advertisement->category_id = $input['category'];
        $advertisement->description = $input['description'];
        $advertisement->user_id     = Auth::user()->id;

        $slug = Slug::make($advertisement->id.'-'.$advertisement->title);
        $advertisement->url = $slug;
        $advertisement->save();
        $category = Category::select('url')->where('id',$advertisement->category_id)->first()->url;

        return redirect()
            ->route('advertisement',['locale'=>$locale,'category'=>$category,'url'=>$slug])
            ->with('success',trans('message.advertisement_update'));
    }

    public function comment_create(){
        $post = Input::all();

        $comment = new Comment();
        $comment->text             = $post['text'];
        $comment->price            = $post['price'];
        $comment->advertisement_id = $post['hidden_adv_id'];
        $comment->user_id          = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('success',trans('message.comment_success_add'));
    }

    public function select_sug($id){
        $comment = Comment::find($id);
        if(!$comment){
            abort(404);
        }
        $adv = $comment->advertisement;

        if($adv->user_id != Auth::user()->id){
            abort(404);
        }
        $adv->sel_comment = $id;
        $adv->status = 'blocked';
        $adv->save();

        return redirect()->back()->with('success',trans('message.comment_success_select'));
    }

    public function cancel_sug($id){
        $adv = Advertisement::find($id);
        if(!$adv){
            abort(404);
        }
        if($adv->user_id != Auth::user()->id){
            abort(404);
        }
        $adv->sel_comment = 0;
        $adv->status = 'default';
        $adv->save();

        return redirect()->back()->with('success',trans('message.comment_success_cancel'));
    }

    public function message_send(){
        $mes = Input::get('message','');
        $to_id   = Input::get('to_id',0);
        $from_id = Auth::user()->id;

        $user = User::find($to_id);
        if(!$user) abort(404);

        $message = new Message();
        $message->from_id = $from_id;
        $message->to_id   = $to_id;
        $message->message = $mes;
        $message->save();

        return redirect()->back()->with('success',trans('message.message_success_send'));
    }
}
