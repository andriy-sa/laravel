<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class FrontComposer {

	public $test = "sa_test_compose";

	public function __construct(){

	}

	public function compose(View $view) {

		$view->with('test',$this->test);

	}

}