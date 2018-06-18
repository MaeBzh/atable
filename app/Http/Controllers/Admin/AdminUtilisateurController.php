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

class AdminUtilisateurController extends Controller
{
    public function afficherStatsUtilisateurs()
    {
        return view('admin.stats.utilisateurs');
    }

    /**
     * Affiche la liste des membres du site
     *
     * @return \View
     */
    public function afficherGestionUtilisateurs()
    {
        // On récupère tous les membres qui ne sont pas admin
        $utilisateurs = User::all()->filter(function ($user) {
            return $user->isAdmin() == false;
        });

        return view('admin.gestion.utilisateurs')
            ->with('users', $utilisateurs);
    }

    /**
     * Active le compte d'un membre
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function traiterFormulaireActiverUtilisateur(User $user)
    {
        try {
            $user->actif = true;
            $user->saveOrFail();
            \Session::flash("success", "Le compte utilisateur {$user->pseudo} a été activé");
        } catch (\Exception $e) {
            \Session::flash("error", "Une erreur est survenue.");
        }

        return redirect()->route("admin.gestion.utilisateurs");
    }

    /**
     * Désactive le compte d'un membre
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function traiterFormulaireDesactiverUtilisateur(User $user)
    {
        try {
            $user->actif = false;
            $user->saveOrFail();
            \Session::flash("success", "Le compte utilisateur {$user->pseudo} a été désactivé");
        } catch (\Exception $e) {
            \Session::flash("error", "Une erreur est survenue.");
        }

        return redirect()->route("admin.gestion.utilisateurs");
    }

    public function supprimerUtilisateur($user){
        try{
            $user->delete($user->id);
            \Session::flash("success", "Le compte utilisateur a été supprimé");
        } catch (\Exception $e) {
            \Session::flash("error", "Une erreur est survenue.");
        }
        return redirect()->route("admin.gestion.utilisateurs");
    }
}