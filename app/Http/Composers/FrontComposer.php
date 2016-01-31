<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Session;

class FrontComposer {

	public $error;
	public $success;
	public $cur_local;

	public function __construct(){
		$this->error     = Session::get('error',false);
		$this->success   = Session::get('success',false);
		$this->cur_local = Config::get('app.locale');
	}

	public function compose(View $view) {

		$view->with('error',$this->error)
			->with('success',$this->success)
			->with('cur_local',$this->cur_local);

	}

}