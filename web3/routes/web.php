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

Route::get('/','PagesController@home');
Route::get('/contact','PagesController@contact');
Route::get('/about','PagesController@about');
Route::get('/create','PagesController@create');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::namespace('Admin')->group(function (){
    Route::apiResource('products','ProductsController');
    Route::apiResource('profile','UserProfileController');

    Route::get('/users/excel', 'UserController@export')->name('users.excel');
    Route::get('/users', 'UserController@index');
});
Route::namespace('User')->group(function (){
    Route::apiResource('products','ProductsController')
    ->only(['index','show']);
    Route::apiResource('profile','UserProfileController')
    ->only(['show','update']);
});
Route::namespace('Guest')->group(function (){
    Route::apiResource('products','ProductsController')
        ->only(['index','show']);
});


