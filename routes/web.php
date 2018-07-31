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

Route::get('Utilisateur/editUtilisateur/{id}',[
	'uses'=>'UtilisateurController@editUtilisateur',
	'as'=>'editUtilisateur'
]);

Route::get('Utilisateur/updateUtilisateur',[
	'uses'=>'UtilisateurController@updateUtilisateur',
	'as'=>'updateUtilisateur'
]);

Route::get('deleteUser/{id}',[
	'uses'=>'UtilisateurController@getUserDelete',
	'as'=>'deleteUser'
]);

/* Materiel */

Route::get('Material/addMaterial',[
	'uses'=>'MaterielController@getMataddview',
	'as'=>'getMat'
]);

Route::get('Material/getMaterial',[
	'uses'=>'MaterielController@getMaterial',
	'as'=>'getMate'
]);

Route::get('Material/storeMat',[
	'uses'=>'MaterielController@storeMateriel',
	'as'=>'store'
]);

Route::get('Material/editMaterial/{id}',[
	'uses'=>'MaterielController@getMaterielEdit',
	'as'=>'editMate'
]);

Route::get('Material/updateMat/{id}',[
	'uses'=>'MaterielController@updateMateriel',
	'as'=>'updateMateriel'
]);




/* NOT YET */


Route::get('deleteMaterial/{id}',[
	'uses'=>'admineController@getMaterialDelete',
	'as'=>'deleteMate'
]);
	

Route::get('getAffectation',[
	'uses'=>'admineController@getAffectation',
	'as'=>'getAffectation'
]);


Route::post('storeAffectation',[
	'uses'=>'admineController@storeAffectation',
	'as'=>'storeAffectation'
]);





Auth::routes();
