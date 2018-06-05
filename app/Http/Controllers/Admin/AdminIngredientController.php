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
        return view('admin.gestion.ingredients')
            ->with('users', Ingredient::all());
    }
}