<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Auth;
use Image;
use Input;
use Validator;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('site.profile.home')
            ->with('user',$user);
    }

    public function post_index(){
        $rules = ['name'        => 'required'];
        $image = Input::file('image',false);
        if($image) {
            $rules['image'] = 'image|required';
        }
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->all());
        }
        $user = Auth::user();
        $user->name = Input::get('name','');
        $user->last_name = Input::get('last_name','');
        $user->phone = Input::get('phone','');
        if($image){
            $destinationPath = 'userfiles/tmp/';
            $extension = $image->getClientOriginalExtension();
            $fileName = str_random(20) . "." . $extension;
            $image->move($destinationPath, $fileName);
            Image::make($destinationPath.$fileName)->fit(300,300)->save("userfiles/$fileName");
            unlink($destinationPath.$fileName);
            if(file_exists("userfiles/$user->photo") && $user->photo != 'default.png'){
                unlink("userfiles/$user->photo");
            }
            $user->photo = $fileName;
        }
        $user->save();
        return redirect()->back()->with('success',trans('message.success_update_profile'));
    }

    public function my_advert($locale){
        $user = Auth::user();
        $advert = Advertisement::where('published',1)
            ->where('user_id',$user->id)
            ->with(['category' => function($query){
                $query->withTrashed();
            }])
            ->orderBy('created_at','desc')
            ->paginate(20);

        return view('site.profile.my_advert')
            ->with('advert',$advert);
    }

    public function my_answer($locale){
        $user = Auth::user();

        $advert = Advertisement::where('published',1)
            ->whereHas('comments',function($q) use ($user){
                $q->where('user_id',$user->id);
            })
            ->has('category')
            ->orderBy('created_at','desc')
            ->paginate(20);

        return view('site.profile.my_answer')
            ->with('advert',$advert);
    }

    public function to_message(){
        $user = Auth::user();

        $messages = $user->message_to()->orderBy('created_at','desc')->paginate(20);

        return view('site.profile.to_message')
            ->with('messages',$messages);
    }

    public function from_message(){
        $user = Auth::user();

        $messages = $user->message_from()->orderBy('created_at','desc')->paginate(20);

       // dd($messages);

        return view('site.profile.from_message')
            ->with('messages',$messages);
    }


}
