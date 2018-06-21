<?php

namespace App\Http\Controllers;

use App\Recette;
use App\RecetteDuJour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recette_du_jour = RecetteDuJour::recetteDuJour();

        // Si la personne qui consulte l'accueil n'est pas connecté
        // On affiche la version invite de l'accueil,
        // Sinon on affiche la version membre de l'accueil
        if (\Auth::guest()) {
            return view('invite.accueil')
                ->with("recette_du_jour", $recette_du_jour);
        } else {
            return view('membre.accueil.accueil')
                ->with('recette_du_jour', $recette_du_jour)
                ->with('recettes_aleatoires', Recette::recettesRandom(3));
        }
    }
}
