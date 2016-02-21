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

        Route::get('advertisements/update/{id}',['middleware'=>'auth','uses'=>'AdvertisementController@update'])->name('advert_update')->where('locale','uk|ru');
        Route::post('advertisements/update/{id}',['middleware'=>'auth','uses'=>'AdvertisementController@post_update'])->name('post_advert_update')->where('locale','uk|ru');

        Route::get('advertisements','AdvertisementController@index')->name('advert')->where('locale','uk|ru');
        Route::get('advertisements/{category}','AdvertisementController@category')->name('cat_advert')->where('locale','uk|ru');
        Route::get('advertisements/{category}/{url}','AdvertisementController@advertisement')->name('advertisement')->where('locale','uk|ru');

        Route::post('advertisements/comment-create',['middleware'=>'auth','uses'=>'AdvertisementController@comment_create'])->name('post_comment_create')->where('locale','uk|ru');

        Route::get('/search','AdvertisementController@search')->name('search')->where('locale','uk|ru');
        Route::get('/help','DefaultController@help')->name('help')->where('locale','uk|ru');
        Route::get('/request','DefaultController@request')->name('request')->where('locale','uk|ru');
        Route::post('/request','DefaultController@request_post')->name('request_post')->where('locale','uk|ru');

        /* profile */
        Route::get('/home', 'HomeController@index')->name('profile');
        Route::post('/home', 'HomeController@post_index')->name('profile_post');
        Route::get('/my-advertisement', 'HomeController@my_advert')->name('my_advert');
        Route::get('/my-answer', 'HomeController@my_answer')->name('my_answer');
        Route::get('/from-message', 'HomeController@from_message')->name('from_message');
        Route::get('/to-message', 'HomeController@to_message')->name('to_message');

    });
    Route::get('advertisements/select_suggestion/{id}',['middleware'=>'auth','uses'=>'AdvertisementController@select_sug'])->name('select_sug');
    Route::get('advertisements/cancel_suggestion/{id}',['middleware'=>'auth','uses'=>'AdvertisementController@cancel_sug'])->name('cancel_sug');
    Route::post('message_send',['middleware'=>'auth','uses'=>'AdvertisementController@message_send'])->name('message_send');

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {

    	Route::get('users', 'DefaultController@users')->name('users');
        Route::get('/','AdminController@index')->name('admin_index');
	});

});
