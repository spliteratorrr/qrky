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

Route::get('/qr/{id}', 'QRCodeController@show');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/qrcs', 'QRCodeController@manage_qrcs_ug')->name('manage-qrcs-ug');
    Route::get('/qrcs/{id}', 'QRCodeController@manage_qrcs_g')->name('manage-qrcs-g');
    
    Route::get('/groups', 'QRCodeController@manage_grps')->name('manage-grps');
    Route::get('/print', 'QRCodeController@qrc_printable')->name('print-qr');
    Route::post('/preview', 'QRCodeController@preview')->name('preview-qr');
    
    // CRUD Operations
    Route::post('/create', 'QRCodeController@qrc_create')->name('create-qr');
    Route::post('/update', 'QRCodeController@qrc_update')->name('update-qr');
    Route::post('/delete', 'QRCodeController@qrc_delete')->name('delete-qr');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');