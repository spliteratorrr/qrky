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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/create', 'QRCodeController@create')->name('create');

    Route::get('/qrcs', 'QRCodeController@manage_qrcs_ug')->name('manage-qrcs-ug');
    Route::get('/qrcs/{id}', 'QRCodeController@manage_qrcs_g')->name('manage-qrcs-g');
    
    Route::get('/groups', 'QRCodeController@manage_grps')->name('manage-grps');
    Route::post('/preview', 'QRCodeController@preview');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

