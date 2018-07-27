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


Route::get('editMaterial/{id}',[
	'uses'=>'admineController@getMaterialEdit',
	'as'=>'editMate'
]);
Route::get('deleteMaterial/{id}',[
	'uses'=>'admineController@getMaterialDelete',
	'as'=>'deleteMate'
]);
Route::get('deleteUser/{id}',[
	'uses'=>'admineController@getUserDelete',
	'as'=>'deleteUser'
]);



Route::get('getAffectation',[
	'uses'=>'admineController@getAffectation',
	'as'=>'getAffectation'
]);
Route::get('getMaterial',[
	'uses'=>'admineController@getMaterial',
	'as'=>'getMate'
]);
Route::get('getUser',[
	'uses'=>'admineController@getUser',
	'as'=>'getUse'
]);
Route::post("store","admineController@store");
Route::post("storeUser","admineController@storeUser");
Route::post("storeAffectation","admineController@storeAffectation");
Route::post("editMat","admineController@updateMaterial");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
