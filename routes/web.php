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
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::any('/link/uploadimage', 'LinkController@uploadimage')->name('link.uploadimage');
    Route::any('/link/delete', 'LinkController@destroy')->name('link.delete');
    Route::any('/link/delall', 'LinkController@delall')->name('link.delall');
    Route::resource('/link','LinkController');
});
