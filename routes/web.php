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
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('admin.home');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/show','HomeAdminController@show')->name('show');
Route::get('/admin/product/create','HomeAdminController@create')->name('create');
Route::post('/admin/product','HomeAdminController@store')->name('store');
Route::get('/admin/products/{id}','HomeAdminController@delete')->name('product.delete');
Route::get('/admin/product/details/{id}','HomeAdminController@details')->name('product.details');
Route::get('/admin/product/search','HomeAdminController@search')->name('product.search');
Route::get('/admin/product/update/{id}','HomeAdminController@update')->name('product.update');
Route::post('/admin/product/update','HomeAdminController@save_update')->name('product.save.update');