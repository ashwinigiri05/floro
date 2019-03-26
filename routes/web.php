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

Auth::routes(['register' => false]);
//Route::get('/ResetPassword','HomeController@showResetPassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/export', 'HomeController@export')->name('export');
Route::get('/search', 'HomeController@search');
// Route::get('/sort', 'HomeController@sort');
Route::get('/home/create', 'HomeController@create');
Route::post('/home/create/store', 'HomeController@store');
Route::get('/home/{id}/edit', 'HomeController@edit');
 Route::patch('/home/{id}', 'HomeController@update');
Route::get('/home/{id}', 'HomeController@destroy');
//Route::get('/home/export', 'exportExcelController@index');
//Route::get('/home/excel_expoart/excel', 'exportExcelController@excel')->name('excel_expoart.excel');
//Route::get('export', 'HomeController@export')->name('export');
//Route::get('importExportView', 'HomeController@importExportView');
//Route::post('import', 'HomeController@import')->name('import');