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

Route::get('/', function () {
    return view('front.master');
});


Route::group([
   'prefix' => 'admin',
   'as' => 'admin.'
], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::get('/', 'Dashboard\DashboardController@index')->name('index');
    Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('logout');

    Route::group([
       'prefix' => 'slider',
       'namespace' => 'Dashboard',
       'as' => 'sliders.'
    ], function () {
        Route::get('/', 'SliderController@index')->name('index');
        Route::get('/create', 'SliderController@create')->name('create');
        Route::post('/store', 'SliderController@store')->name('store');
        Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
        Route::put('/update/{id}', 'SliderController@update')->name('update');
        Route::delete('/delete/{id}', 'SliderController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'SliderController@imageDestroy');

    });

    Route::group([
        'prefix' => 'about-us',
        'namespace' => 'Dashboard',
        'as' => 'about-us.'
    ], function () {
        Route::get('/', 'AboutUsController@index')->name('index');
        Route::get('/create', 'AboutUsController@create')->name('create');
        Route::post('/store', 'AboutUsController@store')->name('store');
        Route::get('/edit/{id}', 'AboutUsController@edit')->name('edit');
        Route::put('/update/{id}', 'AboutUsController@update')->name('update');
        Route::delete('/delete/{id}', 'AboutUsController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'AboutUsController@imageDestroy');
    });

    Route::group([
        'prefix' => 'testimonials',
        'namespace' => 'Dashboard',
        'as' => 'testimonial.'
    ], function () {
        Route::get('/', 'TestimonialController@index')->name('index');
        Route::get('/create', 'TestimonialController@create')->name('create');
        Route::post('/store', 'TestimonialController@store')->name('store');
        Route::get('/edit/{id}', 'TestimonialController@edit')->name('edit');
        Route::put('/update/{id}', 'TestimonialController@update')->name('update');
        Route::delete('/delete/{id}', 'TestimonialController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'TestimonialController@imageDestroy');
    });

    Route::group([
        'prefix' => 'gallery',
        'namespace' => 'Dashboard',
        'as' => 'gallery.'
    ], function () {
        Route::get('/', 'GalleryController@index')->name('index');
        Route::get('/create', 'GalleryController@create')->name('create');
        Route::post('/store', 'GalleryController@store')->name('store');
        Route::get('/edit/{id}', 'GalleryController@edit')->name('edit');
        Route::put('/update/{id}', 'GalleryController@update')->name('update');
        Route::delete('/delete/{id}', 'GalleryController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'GalleryController@imageDestroy');
    });

    Route::group([
        'prefix' => 'staff',
        'namespace' => 'Dashboard',
        'as' => 'staff.'
    ], function () {
        Route::get('/', 'StaffController@index')->name('index');
        Route::get('/create', 'StaffController@create')->name('create');
        Route::post('/store', 'StaffController@store')->name('store');
        Route::get('/edit/{id}', 'StaffController@edit')->name('edit');
        Route::put('/update/{id}', 'StaffController@update')->name('update');
        Route::delete('/delete/{id}', 'StaffController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'StaffController@imageDestroy');
    });

    Route::group([
        'prefix' => 'price',
        'namespace' => 'Dashboard',
        'as' => 'price.'
    ], function () {
        Route::get('/', 'PriceController@index')->name('index');
        Route::get('/create', 'PriceController@create')->name('create');
        Route::post('/store', 'PriceController@store')->name('store');
        Route::get('/edit/{id}', 'PriceController@edit')->name('edit');
        Route::put('/update/{id}', 'PriceController@update')->name('update');
        Route::delete('/delete/{id}', 'PriceController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'PriceController@imageDestroy');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
