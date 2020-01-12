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
Route::get('/shop','PagesController@shop');
Route::get('/contact','PagesController@contact');
Route::get('/about','PagesController@about');
Route::get('/overview','OverviewController@index');
Route::get('/full/{product}','OverviewController@all');
Route::get('profile/{user}',  ['as' => 'profile', 'uses' => 'UserProfileController@edit']);
Route::patch('profile/{user}/update',  ['as' => 'profile', 'uses' => 'UserProfileController@update']);
//Route::post('profile/{user}/store',['as' => 'profile', 'uses' => 'UserProfileController@store']);
Auth::routes();
Route::resource('products','ProductsController');
Route::get('/home', 'HomeController@index')->name('home');
//Route::post('profile/{user}/store',['as' => 'profile', 'uses' => 'UserProfileController@store']);


//Route::get('/export_excel', 'ExportExcelController@index');
//Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
Route::get('/users/excel', 'UserController@export')->name('users.excel');
Route::get('/users', 'UserController@index');


