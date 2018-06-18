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

class AdminStatistiqueController extends Controller
{
    public function afficherStatistiques(){

        $sous_categories_populaires = Categorie::whereNotNull('categorie_id')
            ->withCount('recettes')
            ->orderBy('recettes_count', 'desc')
            ->limit(5)
            ->get();

        $recettes_recentes = Recette::orderBy('created_at')->limit(5)->get();

        return view('admin.statistiques.statistiques')
            ->with('sous_categories_populaires',  $sous_categories_populaires)
            ->with('recettes_recentes',  $recettes_recentes);
    }
}