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
        return view('admin.gestion.categories');
    }

    public function supprimerCategorie(Categorie $categorie)
    {
        try {
            $libelle_categorie = ucfirst($categorie->libelle_categorie);
            $categorie->delete();
            \Session::flash("success", "La catégorie {$libelle_categorie} a été supprimée");
        } catch (\Exception $e) {
            \Session::flash("error", "Une erreur est survenue.");
        }
        return redirect()->route("admin.gestion.categories");
    }


    public function afficherCreerCategorie()
    {
        return view('admin.gestion.creer_categorie');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function creerCategorie(Request $request)
    {

        DB::beginTransaction();
        try {
            $categorie = new Categorie();
            $categorie->libelle_categorie = $request->libelle_categorie;
            if ($request->has('categorie')) {
                $categorie->categoriePrincipale()->associate($request->categorie);
            }
            $categorie->saveOrFail();

            DB::commit();

            \Session::flash("success", "Catégorie ajoutée avec succès.");
        } catch (\Exception $e) {
            DB::rollback();
            \Session::flash("error", "Une erreur est survenue");
        }

        return redirect()->route('admin.gestion.categories');
    }
}