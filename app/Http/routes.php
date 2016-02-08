<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => '{locale?}','middleware' => ['locale']], function () {
        Route::auth();
        Route::get('/', 'DefaultController@index')->name('home')->defaults('locale','uk')->where('locale','uk|ru');

        Route::get('advertisements/create',['middleware'=>'auth','uses'=>'AdvertisementController@create'])->name('advert_create')->where('locale','uk|ru');
        Route::post('advertisements/create',['middleware'=>'auth','uses'=>'AdvertisementController@post_create'])->name('post_advert_create')->where('locale','uk|ru');

        Route::get('advertisements','AdvertisementController@index')->name('advert')->where('locale','uk|ru');
        Route::get('advertisements/{category}','AdvertisementController@category')->name('cat_advert')->where('locale','uk|ru');
        Route::get('advertisements/{category}/{url}','AdvertisementController@advertisement')->name('advertisement')->where('locale','uk|ru');

        /* profile */
        Route::get('/home', 'HomeController@index')->name('profile');
        Route::post('/home', 'HomeController@post_index')->name('profile_post');
    });

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {

    	Route::get('users', 'DefaultController@users')->name('users');
        Route::get('/','AdminController@index')->name('admin_index');
	});

});
