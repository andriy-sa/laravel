<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sa\Slug;
use Carbon\Carbon;
use App\Models\Baner;
use App\Models\Advertisement;
use App\Models\Category;
use DB;
use Session;
use Validator;
use JsValidator;
use App\Models\Order;
use Input;

class DefaultController extends Controller
{	
    
	public function index(Advertisement $advertModel){

		$b1_baner = Baner::where('type','b1')->get();
		$b2_baner = Baner::where('type','b2')->get();

		$latest_advert = $advertModel->get_last_advert();
		$popular_advert = $advertModel->get_popular_advert();

		$categoryModel = new Category();
		$categories = $categoryModel->get_order_count();

		return view('site.front')
			->with('b1_baner',$b1_baner)
			->with('b2_baner',$b2_baner)
			->with('latest_advert',$latest_advert)
			->with('popular_advert',$popular_advert)
			->with('categories',$categories);
	}

	public function help(Advertisement $advertModel){
		$b1_baner = Baner::where('type','b1')->get();
		$b2_baner = Baner::where('type','b2')->get();

		$latest_advert = $advertModel->get_last_advert();
		$top_advert = $advertModel->get_top_advert();

		$text = DB::table('help_page')->first();

		return view('site.help')
			->with('b1_baner',$b1_baner)
			->with('b2_baner',$b2_baner)
			->with('latest_advert',$latest_advert)
			->with('top_advert',$top_advert)
			->with('text',$text);
	}

	public function request(Advertisement $advertModel){
		$b1_baner = Baner::where('type','b1')->get();
		$b2_baner = Baner::where('type','b2')->get();

		$latest_advert = $advertModel->get_last_advert();
		$top_advert = $advertModel->get_top_advert();

		$rules = [
			'name' => 'required',
			'phone' => 'required',
			'aid' => 'required',
		];

		$validator = JsValidator::make($rules);

		return view('site.request')
			->with('b1_baner',$b1_baner)
			->with('b2_baner',$b2_baner)
			->with('latest_advert',$latest_advert)
			->with('top_advert',$top_advert)
			->with('validator',$validator);
	}

	public function request_post(){
		$post = Input::all();
		$rules = [
			'name' => 'required',
			'phone' => 'required',
			'aid' => 'required',
		];
		$validator = Validator::make($post,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all())->withInput();
		}

		$order = new Order();
		$order->name = $post['name'];
		$order->phone = $post['phone'];
		$order->aid = $post['aid'];
		$order->type = $post['type'];
		$order->save();

		return redirect()->back()
			->with('success',trans('message.message_success_send'));
	}

}