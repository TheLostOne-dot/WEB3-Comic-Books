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
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::prefix('Admin')->group(function (){
    Route::apiResource('products','Admin\ProductsController');
    Route::apiResource('profile','Admin\UserProfileController');

    Route::get('/users/excel', 'Admin\UserController@export')->name('users.excel');
    Route::get('/users', 'Admin\UserController@index');
});
Route::prefix('User')->group(function (){
    Route::apiResource('products','User\ProductsController')
    ->only(['index','show']);
    Route::apiResource('profile','User\UserProfileController')
    ->only(['show','update']);
});
Route::prefix('Guest')->group(function (){
    Route::apiResource('products','Guest\ProductsController')
        ->only(['index','show']);
});


