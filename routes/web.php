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

Route::get('/', "rabrawController@index");

Route::get("/search","rabrawController@search");

Route::get("/page/{page}","rabrawController@page");

Route::get("/show/{paging}"."rabrawController@pagging");


Route::get("/tambah", function(){
    return view('tambah');
});

Route::post("/tambah_url","rabrawController@tambah");