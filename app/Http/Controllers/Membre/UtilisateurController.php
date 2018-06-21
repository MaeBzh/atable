<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Recette;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilisateurController extends Controller
{
    public function afficherProfil(User $user)
    {
        return view('membre.utilisateurs.profil')
            ->with('user', $user);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function modifierProfil(User $user, Request $request)
    {
        // On limite la modification du profil à l'utilisateur correspondant et aux admins
        if (\Auth::user()->id == $user->id || \Auth::user()->isAdmin()) {
            DB::beginTransaction();
            try {
                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->email = $request->email;
                $user->saveOrFail();

                DB::commit();

                \Session::flash("success", "Modifications du profil enregistrées avec succès.");
            } catch (\Exception $e) {
                DB::rollback();

                \Session::flash("error", "Une erreur est survenue");
            }
        }
        return redirect()->route('profil', ['user' => $user]);
    }

    public function afficherMesRecettes(){

        $mes_recettes = \Auth::user()->recettes()->orderByDesc('id')->get();

        return view("membre.utilisateurs.mes_recettes")
            ->with("mes_recettes", $mes_recettes);
    }

    public function supprimerRecette(Recette $recette){
        if($recette->auteur()->first()->id == \Auth::user()->id){
            try{
                $titre = ucfirst($recette->titre);
                $recette->delete();
                \Session::flash("success", "La recette $titre a été supprimée avec succès.");
            }catch (\Exception $e){
                \Session::flash("error", "Une erreur est survenue");
            }
        }

        return redirect()->route("mes_recettes");
    }
}
