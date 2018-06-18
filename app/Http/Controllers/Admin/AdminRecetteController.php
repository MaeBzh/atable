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
use Illuminate\Support\Facades\Session;

class AdminRecetteController extends Controller
{
    public function afficherStatsRecettes()
    {
        return view("admin.stats.recettes");
    }

    public function afficherGestionRecettes()
    {
        return view("admin.gestion.recettes");
    }

    public function supprimerRecette(Recette $recette){
        try{
            $titre = ucfirst($recette->titre);
            $recette->delete();
            \Session::flash("success", "Recette {$titre} supprimée avec succès");
        } catch (\Exception $e) {
            Session::flash("error", "Une erreur est survenue");
        }

        return redirect()->route("admin.gestion.recettes");
    }
}