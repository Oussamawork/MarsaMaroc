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
    return view('layouts.master');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('addMaterial', function () {
    return view('admin.addMaterial');
});
Route::get('addAffectation', function () {
    return view('admin.addAffectation');
});
Route::get('addUser', function () {
    return view('admin.addUser');
});


Route::post("store","admineController@store");
Route::post("storeUser","admineController@storeUser");
Route::post("storeAffectation","admineController@storeAffectation");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
