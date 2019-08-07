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

Route::get('/', 'GuestController@welcome')->name('index');
Route::post('/order', 'GuestController@order')->name('order');
Route::get('/myorder', 'GuestController@myorder')->name('myorder');
Route::get('/myorder/detail', 'GuestController@myorder_detail')->name('myorder.detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'menu', 'middleware' => 'role:owner'], function() {
    Route::get('/', 'MenuController@view')->name('menu.view');
    Route::get('/create', 'MenuController@create')->name('menu.create');
    Route::post('/create', 'MenuController@submit')->name('menu.submit');
    Route::get('/edit/{id}','MenuController@edit')->name('menu.edit');
    Route::put('/update','MenuController@update')->name('menu.update');
    Route::delete('/delete/{id}','MenuController@delete')->name('menu.delete');
    Route::get('/search','MenuController@search')->name('menu.search');
});
Route::group(['prefix' => 'pegawai', 'middleware' => 'role:owner'], function() {
    Route::get('/', 'PegawaiController@view')->name('pegawai.view');
    Route::get('/create', 'PegawaiController@create')->name('pegawai.create');
    Route::post('/create', 'PegawaiController@submit')->name('pegawai.submit');
    Route::get('/edit/{id}','PegawaiController@edit')->name('pegawai.edit');
    Route::put('/update','PegawaiController@update')->name('pegawai.update');
    Route::delete('/delete/{id}','PegawaiController@delete')->name('pegawai.delete');
    Route::get('/search','PegawaiController@search')->name('pegawai.search');
});

Route::group(['prefix' => 'pegawai', 'middleware' => 'role:owner'], function() {
    Route::get('/', 'PegawaiController@view')->name('pegawai.view');
    Route::get('/create', 'PegawaiController@create')->name('pegawai.create');
    Route::post('/create', 'PegawaiController@submit')->name('pegawai.submit');
    Route::get('/edit/{id}','PegawaiController@edit')->name('pegawai.edit');
    Route::put('/update','PegawaiController@update')->name('pegawai.update');
    Route::delete('/delete/{id}','PegawaiController@delete')->name('pegawai.delete');
    Route::get('/search','PegawaiController@search')->name('pegawai.search');
});

Route::group(['prefix' => 'meja', 'middleware' => 'role:owner'], function() {
    Route::get('/', 'MejaController@view')->name('meja.view');
    Route::get('/create', 'MejaController@create')->name('meja.create');
    Route::post('/create', 'MejaController@submit')->name('meja.submit');
    Route::get('/edit/{id}','MejaController@edit')->name('meja.edit');
    Route::put('/update','MejaController@update')->name('meja.update');
    Route::delete('/delete/{id}','MejaController@delete')->name('meja.delete');
    Route::get('/search','MejaController@search')->name('meja.search');
});

Route::group(['prefix' => 'salary', 'middleware' => 'role:owner'], function() {
Route::get('/', 'LaporanController@salary')->name('salary.view');
Route::get('/year', 'LaporanController@ysalary')->name('year.salary.view');
Route::get('/pdf', 'LaporanController@salary_pdf')->name('salary.pdf');
Route::get('/excel', 'LaporanController@salary_excel')->name('salary.excel');
Route::get('/year/pdf', 'LaporanController@ysalary_pdf')->name('year.salary.pdf');
Route::get('/year/excel', 'LaporanController@ysalary_excel')->name('year.salary.excel');
});
