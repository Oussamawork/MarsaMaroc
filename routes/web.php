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

Route::get('Material/updateMateriel',[
	'uses'=>'MaterielController@updateMateriel',
	'as'=>'updateMateriel'
]);

Route::get('Material/reformMateriel',[
	'uses'=>'MaterielController@reformMateriel',
	'as'=>'reformMateriel'
]);

Route::get('deleteMaterial/{id}',[
	'uses'=>'MaterielController@getMaterialDelete',
	'as'=>'deleteMaterial'
]);


/* Fournisseur */



Route::get('Fournisseur/getFournisseur',[
	'uses'=>'FournisseurController@getFournisseur',
	'as'=>'getFournisseur'
]);

Route::get('Fournisseur/addFournisseur',[
	'uses'=>'FournisseurController@getFouraddview',
	'as'=>'addFournisseur'
]);


Route::get('Fournisseur/storeFour',[
	'uses'=>'FournisseurController@storeFournisseur',
	'as'=>'storeFournisseur'
]);

Route::get('deleteFournisseur/{id}',[
	'uses'=>'FournisseurController@getFournisseurDelete',
	'as'=>'deleteFournisseur'
]);

Route::get('Fournisseur/updateFournisseur',[
	'uses'=>'FournisseurController@updateFournisseur',
	'as'=>'updateFournisseur'
]);

Route::get('Fournisseur/editFournisseur/{id}',[
	'uses'=>'FournisseurController@getFournisseurEdit',
	'as'=>'editFournisseur'
]);


/* type et entite */


Route::get('Type/addType',[
	'uses'=>'TypeController@getaddview',
	'as'=>'addType'
]);

Route::get('Type/storeType',[
	'uses'=>'TypeController@storeType',
	'as'=>'storeType'
]);


Route::get('Entite/storeEntite',[
	'uses'=>'EntityController@storeEntity',
	'as'=>'storeEntity'
]);

Route::get('Entite/addEntite',[
	'uses'=>'EntityController@getaddview',
	'as'=>'addEntity'
]);



/* NOT YET */

	

Route::get('getAffectation',[
	'uses'=>'admineController@getAffectation',
	'as'=>'getAffectation'
]);


Route::post('storeAffectation',[
	'uses'=>'admineController@storeAffectation',
	'as'=>'storeAffectation'
]);










Auth::routes();
