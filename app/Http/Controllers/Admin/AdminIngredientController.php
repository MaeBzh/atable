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

class AdminIngredientController extends Controller
{
    /**
     * Affiche la liste des membres du site
     *
     * @return \View
     */
    public function afficherGestionIngredients()
    {
        return view('admin.gestion.ingredients');
    }

    public function supprimerIngredient(Ingredient $ingredient)
    {
        try {
            $nom = ucfirst($ingredient->nom);
            $ingredient->delete();
            \Session::flash("success", "L'ingrédient {$nom} a été supprimé");
        } catch (\Exception $e) {
            \Session::flash("error", "Une erreur est survenue.");
        }
        return redirect()->route("admin.gestion.ingredients");
    }


    public function afficherCreerIngredient()
    {
        return view('admin.gestion.creer_ingredient');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function creerIngredient(Request $request)
    {

        DB::beginTransaction();
        try {
            $ingredient = new Ingredient();
            $ingredient->nom = $request->nom;
            $ingredient->saveOrFail();

            DB::commit();

            \Session::flash("success", "Ingrédient ajouté avec succès.");
        } catch (\Exception $e) {
            DB::rollback();
            \Session::flash("error", "Une erreur est survenue");
        }

        return redirect()->route('admin.gestion.ingredients');
    }
}