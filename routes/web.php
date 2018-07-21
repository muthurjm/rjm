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


Route::group(['middleware'=>'auth'], function () {
Route::resource('/client', 'admin\ClientController');
Route::resource('/product_stock', 'admin\ClientController');
Route::resource('/product', 'admin\ClientController');
});
Route::get('/login', 'admin\AuthController@index');
Route::post('/login', 'admin\AuthController@login');
Route::get('/logout', 'admin\AuthController@logout');