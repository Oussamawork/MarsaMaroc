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


Route::get('addAffectation', function () {
    return view('admin.addAffectation');
});

/* Utilisateur */

Route::get('Utilisateur/addUser',[
	'uses'=>'UtilisateurController@getUtilisateurview',
	'as'=>'addUser'
]);

Route::post('Utilisateur/storeUser',[
	'uses'=>'UtilisateurController@storeUser',
	'as'=>'storeUser'
]);

Route::get('Utilisateur/getUser',[
	'uses'=>'UtilisateurController@getUtilisateur',
	'as'=>'getUse'
]);


/* Materiel */

Route::get('Materiel/addMaterial',[
	'uses'=>'MaterielController@getMatview',
	'as'=>'getMat'
]);

Route::post('Materiel/storeMat',[
	'uses'=>'MaterielController@storeMateriel',
	'as'=>'store'
]);




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







Route::post('storeAffectation',[
	'uses'=>'admineController@storeAffectation',
	'as'=>'storeAffectation'
]);

Route::get('editMat',[
	'uses'=>'admineController@updateMaterial',
	'as'=>'editMat'
]);



Auth::routes();
