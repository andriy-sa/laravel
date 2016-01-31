<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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

        if(!$validator->fails()){
            redirect()->back()->with('success',trans('message.success_update_profile'));
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
        return redirect()->back()->with('error',$validator->errors()->all());
    }
}
