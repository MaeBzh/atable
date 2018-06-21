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

// Routes Membres
Route::middleware(['auth'])->group(function () {

    // Membre connecté
    Route::get('profil/{user}', 'Membre\UtilisateurController@afficherProfil')
        ->name('profil');

    Route::post('profil/{user}', 'Membre\UtilisateurController@modifierProfil')
        ->name('profil.post');

    Route::get('mes_recettes', 'Membre\UtilisateurController@afficherMesRecettes')
        ->name('mes_recettes');

    Route::post('mes_recettes/{recette}/supprimer', 'Membre\UtilisateurController@supprimerRecette')
        ->name('mes_recettes.supprimer.post');

    // Recettes
    Route::prefix('recettes')->group(function () {
        Route::get('nouvelle_recette', 'Membre\RecetteController@afficherCreerRecette')
            ->name('recettes.ajout');

        Route::post('nouvelle_recette', 'Membre\RecetteController@creerRecette')
            ->name('recettes.ajout.post');

        Route::get('{recette}/nouvelle_etape', 'Membre\RecetteController@afficherCreerEtape')
            ->name('recettes.etapes.ajout');

        Route::post('{recette}/nouvelle_etape', 'Membre\RecetteController@creerEtape')
            ->name('recettes.etapes.ajout.post');
    });
});


// Routes Admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::prefix('gestion')->group(function () {
        Route::prefix('utilisateurs')->group(function () {
            Route::get('', 'Admin\AdminUtilisateurController@afficherGestionUtilisateurs')
                ->name('admin.gestion.utilisateurs');

            Route::post('{user}/activer', 'Admin\AdminUtilisateurController@traiterFormulaireActiverUtilisateur')
                ->name('admin.gestion.utilisateurs.activer.post');

            Route::post('{user}/desactiver', 'Admin\AdminUtilisateurController@traiterFormulaireDesactiverUtilisateur')
                ->name('admin.gestion.utilisateurs.desactiver.post');

            Route::post('{user}/supprimer', 'Admin\AdminUtilisateurController@supprimerUtilisateur')
                ->name('admin.gestion.utilisateurs.supprimer.post');
        });

        Route::prefix('categories')->group(function () {
            Route::get('', 'Admin\AdminCategorieController@afficherGestionCategories')
                ->name('admin.gestion.categories');
            Route::post('{categorie}/supprimer', 'Admin\AdminCategorieController@supprimerCategorie')
                ->name('admin.gestion.categories.supprimer.post');
            Route::get('nouvelle_categorie', 'Admin\AdminCategorieController@afficherCreerCategorie')
                ->name('admin.gestion.categories.ajout');
            Route::post('nouvelle_categorie', 'Admin\AdminCategorieController@creerCategorie')
                ->name('admin.gestion.categories.ajout.post');
        });

        Route::prefix('ingredients')->group(function () {
            Route::get('', 'Admin\AdminIngredientController@afficherGestionIngredients')
                ->name('admin.gestion.ingredients');
            Route::post('{ingredient}/supprimer', 'Admin\AdminIngredientController@supprimerIngredient')
                ->name('admin.gestion.ingredients.supprimer.post');
            Route::get('nouvel_ingredient', 'Admin\AdminIngredientController@afficherCreerIngredient')
                ->name('admin.gestion.ingredients.ajout');
            Route::post('nouvel_ingredient', 'Admin\AdminIngredientController@creerIngredient')
                ->name('admin.gestion.ingredients.ajout.post');
        });

        Route::prefix('recettes')->group(function () {
            Route::get('', 'Admin\AdminRecetteController@afficherGestionRecettes')
                ->name('admin.gestion.recettes');
            Route::post('{recette}/supprimer', 'Admin\AdminRecetteController@supprimerRecette')
                ->name('admin.gestion.recettes.supprimer.post');
        });
    });

    Route::get('statistiques', 'Admin\AdminStatistiqueController@afficherStatistiques')
        ->name('admin.statistiques');


});


// Routes public
Route::get('/', function () {
    return redirect()->route("accueil");
});

Route::get('accueil', 'HomeController@index')
    ->name('accueil');

Route::post('recettes/rechercher', 'Membre\RecetteController@rechercherRecette')
    ->name('recettes.rechercher.post');
Route::get('recettes/rechercher/ajax', 'Membre\RecetteController@resultatRechercherRecette')
    ->name('recettes.rechercher.ajax');

Route::get('recettes/categories', 'Membre\RecetteController@recetteCategorie')
    ->name('recettes.categories');
Route::get('recettes/categories/ajax', 'Membre\RecetteController@resultatRecetteCategorie')
    ->name('recettes.categories.ajax');

Route::get('recettes/{recette}', 'Membre\RecetteController@afficherRecette')
    ->name('recettes.consulter');
