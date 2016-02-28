<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Input;
use Validator;
use App\Sa\Slug;
use App\Models\Baner;
use View;

class AdminController extends Controller
{
	public function __construct(){
		$last_orders = Order::orderBy('created_at','desc')->take(5)->get();

		View::share('last_orders',$last_orders);
	}
    
	public function index(){
		$help = DB::table('help_page')->first();

		return view('admin.index')
			->with('help',$help);
	}

	public function update_rules(){
		$text_uk = Input::get('text_uk','');
		$text_ru = Input::get('text_ru','');

		DB::table('help_page')->update([
			'text_uk' => $text_uk,
			'text_ru' => $text_ru
		]);

		return redirect()->back()->with('success','Правила сайту успішно обновлено!');
	}

	public function adverts(){
		return view('admin.adverts');
	}

	public function adverts_update($id){
		$advert = Advertisement::find($id);
		if(!$advert) abort(404);

		$categories_select = Category::lists('uk_title','id');

		return view('admin.advert_update')
			->with('advert',$advert)
			->with('categories_select',$categories_select);
	}

	public function adverts_update_post($id){
		$advert = Advertisement::find($id);
		if(!$advert) abort(404);

		$post = Input::all();
		$published = Input::get('published',0);

		$rules = [
			'title'       => 'required|min:5|max:255',
			'description' => 'required',
			'category'    => 'required|numeric',
			'status'      => 'required'
		];
		$validator = Validator::make($post,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all());
		}

		$advert->title       = $post['title'];
		$advert->category_id = $post['category'];
		$advert->description = $post['description'];
		$advert->status      = $post['status'];
		$advert->published   = $published;
		$slug = Slug::make($advert->id.'-'.$advert->title);
		$advert->url = $slug;
		$advert->save();

		return redirect()->route('admin_adverts')->with('success','Оголошення успішно змінено!');
	}

	public function adverts_delete($id){
		$advert = Advertisement::find($id);
		if(!$advert) abort(404);

		$advert->delete();

		return redirect()->route('admin_adverts')->with('success','Оголошення успішно видалено!');
	}

	public function baners(){
		$baners = Baner::orderBy('id','desc')->get();

		return view('admin.baners')
			->with('baners',$baners);
	}

	public function baners_add(){
		return view('admin.baners_add');
	}

	public function baners_add_post(){
		$rules = [
			'note' => 'required|min:5',
			'url'  => 'required',
			'type'  => 'required',
			'image'  => 'required|image',
		];
		$input = Input::all();
		$image = Input::file('image',false);

		$validator = Validator::make($input,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all())->withInput();
		}

		$baner = new Baner();
		$baner->note = $input['note'];
		$baner->url = $input['url'];
		$baner->type = $input['type'];

		$destinationPath = 'userfiles/baners/';
		$extension = $image->getClientOriginalExtension();
		$fileName = str_random(20) . "." . $extension;
		$image->move($destinationPath, $fileName);
		$baner->image = $fileName;
		$baner->save();

		return redirect()->route('admin_baners')->with('success','Банер успішно додано!');
	}

	public function baner_update($id){
		$baner = Baner::find($id);
		if(!$baner) abort(404);

		return view('admin.baner_update')
			->with('baner',$baner);
	}

	public function baner_update_post($id){
		$baner = Baner::find($id);
		if(!$baner) abort(404);

		$rules = [
			'note' => 'required|min:5',
			'url'  => 'required',
			'type'  => 'required',
		];
		$input = Input::all();
		$image = Input::file('image',false);

		if($image){
			$rules['image'] = 'required|image';
		}

		$validator = Validator::make($input,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all());
		}

		$baner->note = $input['note'];
		$baner->url = $input['url'];
		$baner->type = $input['type'];
		if($image){
			$destinationPath = 'userfiles/baners/';
			$extension = $image->getClientOriginalExtension();
			$fileName = str_random(20) . "." . $extension;
			$image->move($destinationPath, $fileName);

			if(file_exists("userfiles/baners/$baner->image")){
				unlink("userfiles/baners/$baner->image");
			}

			$baner->image = $fileName;
		}

		$baner->save();

		return redirect()->route('admin_baners')->with('success','Банер успішно змінено!');
	}

	public function baner_delete($id){
		$baner = Baner::find($id);
		if(!$baner) abort(404);

		if(file_exists("userfiles/baners/$baner->image")){
			unlink("userfiles/baners/$baner->image");
		}

		$baner->delete();

		return redirect()->route('admin_baners')->with('success','Банер успішно видалено!');
	}

	public function categories(){
		$categories = Category::orderBy('id','desc')->get();

		return view('admin.categories')
			->with('categories',$categories);
	}

	public function categories_trashed(){
		$categories = Category::onlyTrashed()->orderBy('id','desc')->get();

		return view('admin.categories_trashed')
			->with('categories',$categories);
	}

	public function category_add(){
		return view('admin.category_add');
	}

	public function category_add_post(){
		$input = Input::all();

		$rules = [
			'uk_title' => 'required|unique:categories',
			'ru_title' => 'required',
			'icon' => 'required',
		];

		$validator = Validator::make($input,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all())->withInput();
		}

		$cat = new Category();
		$cat->uk_title = $input['uk_title'];
		$cat->ru_title = $input['ru_title'];
		$cat->icon     = $input['icon'];
		$cat->url      = Slug::make($cat->uk_title);
		$cat->save();

		return redirect()->route('admin_categories')->with('success','Категорія успішно додана!');

	}

	public function category_edit($id){
		$cat = Category::find($id);
		if(!$cat) abort(404);

		return view('admin.category_edit')
			->with('cat',$cat);
	}

	public function category_edit_post($id){
		$cat = Category::find($id);
		if(!$cat) abort(404);

		$input = Input::all();
		$rules = [
			'uk_title' => 'required|unique:categories,uk_title,'.$cat->id,
			'ru_title' => 'required',
			'icon' => 'required',
		];

		$validator = Validator::make($input,$rules);

		if($validator->fails()){
			return redirect()->back()->with('error',$validator->errors()->all())->withInput();
		}

		$cat->uk_title = $input['uk_title'];
		$cat->ru_title = $input['ru_title'];
		$cat->icon     = $input['icon'];
		$cat->url      = Slug::make($cat->uk_title);
		$cat->save();

		return redirect()->route('admin_categories')->with('success','Категорія успішно змінена!');
	}

	public function category_delete($id){
		$cat = Category::find($id);
		if(!$cat) abort(404);

		$cat->delete();

		return redirect()->back()->with('success','Категорія успішно видалена!');
	}

	public function category_restore($id){
		$cat = Category::onlyTrashed()->where('id',$id)->first();
		if(!$cat) abort(404);

		$cat->restore();

		return redirect()->back()->with('success','Категорія успішно відновлена!');
	}

	public function messages(){
		$messages = Order::orderBy('created_at','desc')->get();
		return view('admin.messages')
			->with('messages',$messages);
	}

	public function users(){
		$users = User::orderBy('created_at','desc')
			->whereDoesntHave('roles',function($query){
				$query->where('id',1);
			})
			->get();

		return view('admin.users')
			->with('users',$users);
	}

	public function change_ban(){
		$id  = Input::get('id',0);
		$val = Input::get('val',0);
		$user = User::find($id);
		if(!$user) abort(404);

		$user->ban = $val;
		$user->save();
	}

	public function adverts_ajax(){
		$adverts = Advertisement::
			select('a.id','a.title','c.uk_title','u.name','a.created_at')
			->from('advertisements as a')
			->leftJoin('categories as c','c.id','=','a.category_id')
			->leftJoin('users as u','u.id','=','a.user_id');

		$action = '<a href="{{ URL::route( \'admin_adverts_update\', array("id"=>$id)) }}"><i class="fa fa-fw fa-edit"></i></a>
                    <a class="confirm-remove" href="{{ URL::route( \'admin_adverts_delete\', array("id"=>$id)) }}"><i class="fa fa-fw fa-remove"></i></a>
                ';

		return Datatables::of($adverts)
			->addColumn('action', $action)
			->make();
	}

}
