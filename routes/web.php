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

Route::get('/','WWWHomeController@index');
Route::get('/p/{url}','WWWPageController@show')->name('page');
Route::get('/post','WWWPostController@index')->name('post');
Route::get('/post/{url}','WWWPostController@show')->name('post.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('manager')->name('manager.')->group(function () {
    Route::group(["middleware" => ['manager']], function () {
      Route::get('/', 'ManagerHomeController@index')->name('home');
      Route::resource('/page','ManagerPageController');
      Route::resource('/post','ManagerPostController');



    });
});
