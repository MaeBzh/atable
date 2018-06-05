<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recette;
use App\RecetteDuJour;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategorieController extends Controller
{
    /**
     * Affiche la liste des membres du site
     *
     * @return \View
     */
    public function afficherGestionCategories()
    {
        return view('admin.gestion.categories')
            ->with('categories', Categorie::all());
    }

    public function supprimerCategorie($categorie)
    {
        try {
            Categorie::destroy($categorie);
            \Session::flash("success", "La catégorie a été supprimée");
        } catch (\Exception $e) {
            dd($e);
            \Session::flash("error", "Une erreur est survenue.");
        }
        return redirect()->route("admin.gestion.categories");
    }


    public function afficherAjoutCategorie()
    {
        return view('admin.gestion.ajout_categorie');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function traiterAjoutCategorie(Request $request)
    {

        DB::beginTransaction();
        try {
            $categorie = new Categorie();
            $categorie->libelle_categorie = $request->titre;
            $categorie->categoriePrincipale()->associate($request->categorie);
            $categorie->saveOrFail();

            DB::commit();

            \Session::flash("success", "Catégorie ajoutée avec succès.");
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);

            \Session::flash("error", "Une erreur est survenue");
        }

        return redirect()->route('admin.gestion.categories');
    }
}