<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
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
    public function traiterFormulaireProfil(User $user, Request $request)
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

            return redirect()->route('accueil');
        }
    }
}
