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
Route::get('/p', function () {
    return view('printconfirm');
});
Route::resource('/', 'InvoiceController');
Route::post('/invoice/ajax1/', 'InvoiceController@ajax1');
Route::post('/invoice/ajax2/', 'InvoiceController@ajax2');
Route::resource('/invoiceconfirm', 'InvoiceConfirmController');
Route::post('/raw', 'InvoiceController@ajax3');
Route::get('printinvoice', 'InvoiceController@print');

Route::group(['middleware'=>'auth'], function () {
Route::resource('/client', 'admin\ClientController');
Route::resource('/product_stock', 'admin\ProductStockController');
Route::resource('/product', 'admin\ProductController');
Route::resource('/hsn', 'admin\HsnController');
Route::resource('/purchase', 'admin\PurchaseController');
Route::get('/raw', 'admin\PurchaseController@ajax');
Route::resource('/admin/invoice', 'admin\AdminInvoiceController');
Route::resource('/emptyproduct', 'admin\EmptyProductController');
Route::resource('/taxpay', 'admin\TaxPayController');
Route::post('/taxpay/ajax', 'admin\TaxPayController@ajax');
});
Route::get('/login', 'admin\AuthController@index');
Route::post('/login', 'admin\AuthController@login');
Route::get('/logout', 'admin\AuthController@logout');
