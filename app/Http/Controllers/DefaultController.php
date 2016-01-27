<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sa\Slug;
use Carbon\Carbon;

class DefaultController extends Controller
{	
    
	public function index(){
		dump(app());
		return view('site.front');

	}

	public function users(){
		dd('users in controller!');
	}

}
