<?php

namespace App\Http\Controllers;

use App\Recette;
use App\RecetteDuJour;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends AuthController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficherGestionUtilisateurs()
    {
        return view('dashboard/admin/gestion_utilisateurs');
    }

    public function afficherGestionCategories()
    {
        return view('dashboard/admin/gestion_categories');
    }

    public function afficherGestionRecettes()
    {
        return view('dashboard/admin/gestion_recettes');
    }

    public function afficherGestionIngredients()
    {
        return view('dashboard/admin/gestion_ingredients');
    }

    public function afficherStatsUtilisateurs()
    {
        return view('dashboard/admin/stats_utilisateurs');
    }

    public function afficherStatsRecettes()
    {
        return view('dashboard/admin/stats_recettes');
    }

}

