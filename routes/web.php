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

/* Utilisateur */

Route::get('Utilisateur/addUser',[
	'uses'=>'UtilisateurController@getUtilisateurview',
	'as'=>'addUser',
	'middleware' => 'auth'
]);

Route::post('Utilisateur/storeUser',[
	'uses'=>'UtilisateurController@storeUser',
	'as'=>'storeUser',
	'middleware' => 'auth'
]);

Route::get('Utilisateur/getUser',[
	'uses'=>'UtilisateurController@getUtilisateur',
	'as'=>'getUse',
	'middleware' => 'auth'
]);

Route::get('Utilisateur/editUtilisateur/{id}',[
	'uses'=>'UtilisateurController@editUtilisateur',
	'as'=>'editUtilisateur',
	'middleware' => 'auth'
]);

Route::get('Utilisateur/updateUtilisateur',[
	'uses'=>'UtilisateurController@updateUtilisateur',
	'as'=>'updateUtilisateur',
	'middleware' => 'auth'
]);

Route::get('Utilisateur/roleUtilisateur',[
	'uses'=>'UtilisateurController@roleUtilisateur',
	'as'=>'roleUtilisateur',
	'middleware' => 'auth'
]);

Route::get('Utilisateur/deleteUser/{id}',[
	'uses'=>'UtilisateurController@getUserDelete',
	'as'=>'deleteUser',
	'middleware' => 'auth'
]);


/* Materiel */

Route::get('Material/addMaterial',[
	'uses'=>'MaterielController@getMataddview',
	'as'=>'getMat',
	'middleware' => 'auth'
]);

Route::get('Material/getMaterial',[
	'uses'=>'MaterielController@getMaterial',
	'as'=>'getMate',
	'middleware' => 'auth'
]);

Route::get('Material/storeMat',[
	'uses'=>'MaterielController@storeMateriel',
	'as'=>'store',
	'middleware' => 'auth'
]);

Route::get('Material/editMaterial/{id}',[
	'uses'=>'MaterielController@getMaterielEdit',
	'as'=>'editMate',
	'middleware' => 'auth'
]);

Route::get('Material/updateMateriel',[
	'uses'=>'MaterielController@updateMateriel',
	'as'=>'updateMateriel',
	'middleware' => 'auth'
]);

Route::get('deleteMaterial/{id}',[
	'uses'=>'MaterielController@getMaterialDelete',
	'as'=>'deleteMaterial',
	'middleware' => 'auth'
]);

//Ajax affectation Mat -> Uti

Route::get('Utilisateur/getInfos/{id}',[
	'uses'=>'UtilisateurController@getInfoUser',
	'middleware' => 'auth'
]);

/* Affectation */

Route::get('Affectation/getAffectation',[
	'uses'=>'MaterielController@getAffectation',
	'as'=>'getAffectation',
	'middleware' => 'auth'
]);

Route::get('Affectation/materiel',[
	'uses'=>'MaterielController@addMatAffectation',
	'as'=>'addMatAffectation',
	'middleware' => 'auth'
]);

Route::get('Affectation/getPDFAffectation/{id}',[
	'uses'=>'BonSortieController@getPDFAffectation',
	'as'=>'getPDFAffectation',
	'middleware' => 'auth'
]);

/* Desaffectation */

Route::get('Desaffectation/materiel/{id}',[
	'uses'=>'MaterielController@MatDesaffect',
	'as'=>'MatDesaffect',
	'middleware' => 'auth'
]);



/* Reforme */

Route::get('Material/reformMateriel',[
	'uses'=>'MaterielController@reformMateriel',
	'as'=>'reformMateriel',
	'middleware' => 'auth'
]);

Route::get('Reforme/getReforme',[
	'uses'=>'ReformeController@getReforme',
	'as'=>'getReforme',
	'middleware' => 'auth'
]);

Route::get('CancelReforme/{id}',[
	'uses'=>'ReformeController@CancelReforme',
	'as'=>'CancelReforme',
	'middleware' => 'auth'
]);

Route::get('getPDFReforme/{id}',[
	'uses'=>'BonSortieController@getPDFReforme',
	'as'=>'getPDFReforme',
	'middleware' => 'auth'
]);


/* Panne */


Route::get('Panne/getPanne',[
	'uses'=>'PanneController@getPanne',
	'as'=>'getPanne',
	'middleware' => 'auth'
]);

Route::get('Panne/storePanne',[
	'uses'=>'PanneController@storePanne',
	'as'=>'storePanne',
	'middleware' => 'auth'
]);

Route::get('deletePanne/{id}',[
	'uses'=>'PanneController@PanneDelete',
	'as'=>'deletePanne',
	'middleware' => 'auth'
]);


Route::get('getPDFPanne/{id}',[
	'uses'=>'BonSortieController@getPDFPanne',
	'as'=>'getPDFPanne',
	'middleware' => 'auth'
]);


/* Fournisseur */

Route::get('Fournisseur/getFournisseur',[
	'uses'=>'FournisseurController@getFournisseur',
	'as'=>'getFournisseur',
	'middleware' => 'auth'
]);

Route::get('Fournisseur/addFournisseur',[
	'uses'=>'FournisseurController@getFouraddview',
	'as'=>'addFournisseur',
	'middleware' => 'auth'
]);

Route::get('Fournisseur/storeFour',[
	'uses'=>'FournisseurController@storeFournisseur',
	'as'=>'storeFournisseur',
	'middleware' => 'auth'
]);

Route::get('Fournisseur/updateFournisseur',[
	'uses'=>'FournisseurController@updateFournisseur',
	'as'=>'updateFournisseur',
	'middleware' => 'auth'
]);

Route::get('Fournisseur/editFournisseur/{id}',[
	'uses'=>'FournisseurController@getFournisseurEdit',
	'as'=>'editFournisseur',
	'middleware' => 'auth'
]);

/* type et entite */

Route::get('Type/addType',[
	'uses'=>'TypeController@getaddview',
	'as'=>'addType',
	'middleware' => 'auth'
]);

Route::get('Type/storeType',[
	'uses'=>'TypeController@storeType',
	'as'=>'storeType',
	'middleware' => 'auth'
]);


Route::get('Entite/storeEntite',[
	'uses'=>'EntityController@storeEntity',
	'as'=>'storeEntity',
	'middleware' => 'auth'
]);

Route::get('Entite/addEntite',[
	'uses'=>'EntityController@getaddview',
	'as'=>'addEntity',
	'middleware' => 'auth'
]);


/* sous_traitent */

Route::get('Subcontractor/getSubcontractor',[
	'uses'=>'SubcontractorController@getSubcontractor',
	'as'=>'getSubcontractor',
	'middleware' => 'auth'
]);

Route::get('Subcontractor/addSubcontractor',[
	'uses'=>'SubcontractorController@getSubaddview',
	'as'=>'addSubcontractor',
	'middleware' => 'auth'
]);


Route::get('Subcontractor/storeSubcontractor',[
	'uses'=>'SubcontractorController@storeSubcontractor',
	'as'=>'storeSubcontractor',
	'middleware' => 'auth'
]);

Route::get('deleteSubcontractor/{id}',[
	'uses'=>'SubcontractorController@getSubcontractorDelete',
	'as'=>'deleteSubcontractor',
	'middleware' => 'auth'
]);

Route::get('Subcontractor/updateSubcontractor',[
	'uses'=>'SubcontractorController@updateSubcontractor',
	'as'=>'updateSubcontractor',
	'middleware' => 'auth'
]);

Route::get('Subcontractor/editSubcontractor/{id}',[
	'uses'=>'SubcontractorController@getSubcontractorEdit',
	'as'=>'editSubcontractor',
	'middleware' => 'auth'
]);




Auth::routes();
