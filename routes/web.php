<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------------Route for Font-end--------------*/
Route::get('/', function () {
    return view('front/home');
});


Route::get('home', function () {
    return redirect('front.home');
})->name('home');

Route::get('shop', 'HomeController@shop')->name('shop');
Route::get('index', 'HomeController@index')->name('index');

//page
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('about', 'PagesController@about')->name('about');

Route::get('product', 'PagesController@shop')->name('shop');
Route::get('product_detail/{id}', 'PagesController@product_detail')->name('product_detail');

/*--------------END Route for Font-end--------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*--------------Route for Admin--------------*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']],
    function ()
    {
        Route::get('/','AdminController@index')->name('admin');

        Route::group(['prefix'=>'product'], function (){
            Route::get('/', 'ProductsController@index')->name('pro_list');
            Route::get('list', 'ProductsController@index')->name('pro_list');

            Route::get('create', 'ProductsController@create')->name('pro_create');
            Route::post('create', 'ProductsController@store')->name('pro_create_p');

            Route::get('edit/{id}', 'ProductsController@edit')->name('pro_edit');
            Route::post('edit/{id}', 'ProductsController@update')->name('pro_edit_p');

        });
    }
    );
/*--------------END Route for Admin--------------*/
