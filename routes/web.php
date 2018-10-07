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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Backend'], function () {
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::post('/link/upload_image', 'LinkController@uploadImage')->name('link.upload_image');
    Route::resource('/link','LinkController');
});
