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
})->name('welcome');

Route::get('/qr', 'QRCodeController@show');
Route::get('/create', 'QRCodeController@create')->name('create');
Route::get('/manage', 'QRCodeController@manage')->name('manage');
Route::post('/preview', 'QRCodeController@preview');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

