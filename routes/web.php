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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/union', 'HomeController@union');
Route::get('/uuid/{uuid}', 'HomeController@uuid');
Route::get('/call-store-insert', 'HomeController@storeprocedureInsert');
Route::get('/call-store-get/{id}', 'HomeController@storeprocedureGet');

Route::resource('jabatan', 'JabatanController');
Route::resource('departemen', 'DepartemenController');
Route::get('pegawai/search', 'PegawaiController@index')->name('pegawai.search');
Route::resource('pegawai', 'PegawaiController');
Route::resource('status-cuti', 'StatusCutiController');
Route::resource('jenis-cuti', 'JenisCutiController');
Route::get('pengajuan-cuti/search', 'PengajuanCutiController@index')->name('pengajuan-cuti.search');
Route::resource('pengajuan-cuti', 'PengajuanCutiController');

//Route::get('departemen', function (){
//   return 'departemen';
//})->name('departemen');

//Route::get('pegawai', function (){
//   return 'pegawai';
//})->name('pegawai');
//
//Route::get('status-cuti', function (){
//   return 'status-cuti';
//})->name('status-cuti');
//
//Route::get('jenis-cuti', function (){
//   return 'jenis-cuti';
//})->name('jenis-cuti');
//
//Route::get('pengajuan-cuti', function (){
//   return 'pengajuan-cuti';
//})->name('pengajuan-cuti');
