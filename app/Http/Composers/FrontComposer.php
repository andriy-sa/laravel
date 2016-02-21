<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Session;
use App\Models\Baner;

class FrontComposer {

	public $error;
	public $success;
	public $cur_local;
	public $a1_baner;

	public function __construct(){
		$this->error     = Session::get('error',false);
		$this->success   = Session::get('success',false);
		$this->cur_local = Config::get('app.locale');

		$this->a1_baner = Baner::where('type','a1')->get();
	}

	public function compose(View $view) {

		$view->with('error',$this->error)
			->with('success',$this->success)
			->with('cur_local',$this->cur_local)
			->with('a1_baner',$this->a1_baner);

	}

}