<?php

namespace App\Http\Controllers;

use App\Recette;
use App\RecetteDuJour;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends AuthController
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
    public function index()
    {
        return view('accueil')
            ->with("recette_du_jour", RecetteDuJour::recetteDuJour());
    }

    public function afficherDashboard()
    {
        return view('dashboard/dashboard')
            ->with("recette_du_jour", RecetteDuJour::recetteDuJour())
            ->with("recettes", Recette::recettesRandom(3));
    }

    public function afficherProfil(User $user)
    {

        return view('profil')
            ->with('user', $user);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function updateProfil(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = \Auth::user();

            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->saveOrFail();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
        return redirect()->route('dashboard')->withSuccess('Vos changements ont bien été enregistrés !');

    }
}
