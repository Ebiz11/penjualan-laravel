<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function (){
      return view('index');
    });
    Route::get('/barang', 'BarangController@index');
    Route::get('/show', 'BarangController@show');
    Route::get('/create', 'BarangController@create');
    Route::get('/store', 'BarangController@store');
    // Route::get('/edit/{id}', 'BarangController@edit');
    Route::get('/update', 'BarangController@update');
    Route::get('/destroy', 'BarangController@destroy');

    Route::get('/getBarang','BarangController@getBarang');
});
