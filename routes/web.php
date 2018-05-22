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

Route::get('accueil', 'RecetteController@index')->name('accueil');
Route::get('ajout_recette', 'RecetteController@afficherFormulaireAjoutRecette')->name('ajout_recette.get');
Route::post('ajout_recette', 'RecetteController@traiterFormulaireAjoutRecette')->name('ajout_recette.post');
Route::get('ajout_etape_recette/{recette}', 'RecetteController@afficherFormulaireAjoutEtapeRecette')->name('ajout_etape_recette.get');
Route::post('ajout_etape_recette/{recette}', 'RecetteController@traiterFormulaireAjoutEtapeRecette')->name('ajout_etape_recette.post');
Route::get('consulter_recette/{recette}', 'RecetteController@afficherRecette')->name('consulter_recette.get');
Route::post('search', 'RecetteController@chercherRecette')->name('search.post');

Route::get('dashboard', 'UserController@afficherDashboard')->name('dashboard');
Route::get('profil/{user}', 'UserController@afficherProfil')->name('profil');
Route::post('update_profil', 'UserController@updateProfil')->name('update_profil.post');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//admin
//TODO authorize if admin
Route::prefix('admin')->group(function(){
    Route::get('gestion/utilisateurs', 'AdminController@afficherGestionUtilisateurs')->name('admin.gestion.utilisateurs.get');
    Route::get('gestion/categories', 'AdminController@afficherGestionCategories')->name('admin.gestion.categories.get');
    Route::get('gestion/recettes', 'AdminController@afficherGestionRecettes')->name('admin.gestion.recettes.get');
    Route::get('gestion/ingredients', 'AdminController@afficherGestionIngredients')->name('admin.gestion.ingredients.get');
    Route::get('stats/utilisateurs', 'AdminController@afficherStatsUtilisateurs')->name('admin.stats.utilisateurs.get');
    Route::get('stats/recettes', 'AdminController@afficherStatsRecettes')->name('admin.stats.recettes.get');
});
