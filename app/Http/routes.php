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

        Route::get('/','AdminController@index')->name('admin_index');
        Route::post('/','AdminController@update_rules')->name('admin_index_post');

        Route::get('advertisements','AdminController@adverts')->name('admin_adverts');
        Route::get('advertisements/update/{id}','AdminController@adverts_update')->name('admin_adverts_update');
        Route::post('advertisements/update/{id}','AdminController@adverts_update_post')->name('admin_adverts_update_post');
        Route::get('advertisements/delete/{id}','AdminController@adverts_delete')->name('admin_adverts_delete');

        Route::get('baners','AdminController@baners')->name('admin_baners');
        Route::get('baners/add','AdminController@baners_add')->name('admin_baners_add');
        Route::post('baners/add','AdminController@baners_add_post')->name('admin_baners_add_post');
        Route::get('baners/edit/{id}','AdminController@baner_update')->name('admin_baner_update');
        Route::post('baners/edit/{id}','AdminController@baner_update_post')->name('admin_baner_update_post');
        Route::get('baners/delete/{id}','AdminController@baner_delete')->name('admin_baner_delete');

        Route::get('categories','AdminController@categories')->name('admin_categories');
        Route::get('categories/trashed','AdminController@categories_trashed')->name('admin_categories_trashed');
        Route::get('category/add','AdminController@category_add')->name('admin_category_add');
        Route::post('category/add','AdminController@category_add_post')->name('admin_category_add_post');

        Route::get('category/edit/{id}','AdminController@category_edit')->name('admin_category_edit');
        Route::post('category/edit/{id}','AdminController@category_edit_post')->name('admin_category_edit_post');
        Route::get('category/delete/{id}','AdminController@category_delete')->name('admin_category_delete');
        Route::get('category/restore/{id}','AdminController@category_restore')->name('admin_category_restore');

        Route::get('messages','AdminController@messages')->name('admin_messages');
        Route::get('users','AdminController@users')->name('admin_users');

        Route::post('users/change_ban','AdminController@change_ban');
        Route::any('adverts_ajax','AdminController@adverts_ajax');
	});

});
