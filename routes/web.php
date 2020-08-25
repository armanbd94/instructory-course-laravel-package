<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/','welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*****************************
 * * Begin :: DOM PDF Route **
******************************/
Route::get('/invoice', 'DOMPdfController@index')->name('invoice');
Route::get('/invoice-pdf/{type}', 'DOMPdfController@pdf')->name('invoice.pdf');
/*****************************
 * * End :: DOM PDF Route **
******************************/

/*****************************
 * * Begin :: User Route **
******************************/
Route::get('user', 'HomeController@index')->name('user');
Route::post('upazila-list', 'HomeController@upazilaList')->name('upazila.list');
Route::group(['prefix' => 'user', 'as'=>'user.'], function () {
    Route::post('store', 'HomeController@store')->name('store');
    Route::post('list', 'HomeController@userList')->name('list');
    Route::post('edit', 'HomeController@edit')->name('edit');
    Route::post('show', 'HomeController@show')->name('show');
    Route::post('delete', 'HomeController@destroy')->name('delete');
    Route::post('change-status', 'HomeController@changeStatus')->name('change.status');
    Route::post('bulk-action-delete', 'HomeController@bulkActionDelete')->name('bulk.action.delete');

});
/*****************************
 * * End :: User Route **
******************************/

/*****************************
 * * Begin :: Excel Route **
******************************/
Route::post('upload-excel-file', 'ExcelFileUploadController@index')->name('upload.excel.file');
Route::get('export-excel-file', 'ExcelFileUploadController@export')->name('export.excel.file');

/*****************************
 * * End :: Excel Route **
******************************/

/*****************************
 * * Begin :: Socialite Route **
******************************/
Route::view('customer-login','customer-login');

Route::get('customer-login/{provider}', 'CustomerLoginController@redirectToProvider');
Route::get('customer-login/{provider}/callback', 'CustomerLoginController@handleProviderCallback');

Route::group(['middleware' => ['auth:customer']], function () {
    Route::view('customer-profile','customer-profile');
    Route::post('customer-logout', 'CustomerLoginController@logout');
});
/*****************************
 * * Begin :: Socialite Route **
******************************/