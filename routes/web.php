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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/', 'Page\\MasterController@index')->name('home');
Route::post('/contact', 'Page\\MasterController@contactForm')->name('contact');
Route::get('/locale/{locale}', function ($locale){

    App::setLocale($locale);

    Session::put('locale',$locale);

    return redirect()->back();

})->name('locale');

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
        'prefix' => 'message',
        'namespace' => 'Dashboard',
        'as' => 'message.'
    ], function () {
        Route::get('/', 'MessageController@index')->name('index');
        Route::get('/view/{id}', 'MessageController@show')->name('view');
        Route::delete('/delete/{id}', 'MessageController@destroy')->name('delete');
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
        'prefix' => 'service',
        'namespace' => 'Dashboard',
        'as' => 'service.'
    ], function () {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('/create', 'ServiceController@create')->name('create');
        Route::post('/store', 'ServiceController@store')->name('store');
        Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
        Route::put('/update/{id}', 'ServiceController@update')->name('update');
        Route::delete('/delete/{id}', 'ServiceController@destroy')->name('delete');
        Route::delete('/edit/image/delete/{id}', 'ServiceController@imageDestroy');
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

