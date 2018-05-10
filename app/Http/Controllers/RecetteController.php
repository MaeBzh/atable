<?php

namespace App\Http\Controllers;

use App\Etape;
use App\Photo;
use App\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecetteController extends AuthController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'afficherFormulaireAjoutRecette',
            'traiterFormulaireAjoutRecette',
            'afficherFormulaireAjoutEtapeRecette',
            'traiterFormulaireAjoutEtapeRecette'
        ]
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accueil');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function afficherFormulaireAjoutRecette()
    {
        return view('ajout_recette');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function traiterFormulaireAjoutRecette(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_folder = \Auth::user()->getDossierUser();
            $chemin = $request->file('photo')->store($user_folder);

            $recette = new Recette();
            $recette->titre = $request->titre;
            $recette->nb_pers = $request->nb_pers;
            $recette->photo = $chemin;
            $recette->temps_preparation = $request->temps_preparation;
            $recette->temps_cuisson = $request->temps_cuisson;
            $recette->difficulte = $request->difficulte;
            $recette->prix = $request->prix;
            $recette->auteur()->associate(\Auth::user());
            $recette->saveOrFail();

            DB::commit();
            // return view success
        } catch (\Exception $e) {
            DB::rollback();
            if (!empty($chemin) && Storage::exists($chemin)) {
                Storage::delete($chemin);
            }
            // return view error
        }
        return redirect()->route('ajout_etape_recette.get', ['id' => $recette->id]);
    }

    /**
     * @param Recette $recette
     * @return $this
     */
    public function afficherFormulaireAjoutEtapeRecette(Recette $recette)
    {
        return view('ajout_etape_recette')
            ->with('recette', $recette);
    }

    /**
     * @param Recette $recette
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function traiterFormulaireAjoutEtapeRecette(Recette $recette, Request $request)
    {
        DB::beginTransaction();
        try {
            $user_folder = \Auth::user()->getDossierUser();
            $chemin = $request->file('photo_etape')->store($user_folder);

            $etape = new Etape();
            $etape->titre = $request->titre;
            $etape->photo = $chemin;
            $etape->description = $request->description;
            $etape->recette()->associate($recette);
            $etape->saveOrFail();
            DB::commit();
            if ($request->submit == 'autre_etape') {
                return redirect()->route('ajout_etape_recette.get', ['id' => $recette->id]);
            }
            else {
                 return redirect()->route('dashboard')->withSuccess('Votre recette a bien été enregistrée !');
            }
        } catch (\Exception $e) {
            DB::rollback();
            if (!empty($chemin) && Storage::exists($chemin)) {
                Storage::delete($chemin);
            }
        }
    }

    public
    function afficherRecette(Recette $recette)
    {
        return view("consulter_recette")
            ->with('recette', $recette);
    }

    public function randomRecette(){

    }
}