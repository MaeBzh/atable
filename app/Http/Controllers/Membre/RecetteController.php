<?php

namespace App\Http\Controllers\Membre;

use App\Etape;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Recette;
use App\RecetteDuJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class RecetteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'afficherRecette',
                'chercherRecette'
            ]
        ]);
    }

    /**
     * Affiche le detail de la recette
     *
     * @param Recette $recette
     * @return $this
     */
    public function afficherRecette(Recette $recette)
    {
        return view("commun.consulter_recette")
            ->with('recette', $recette);
    }

    /**
     * Affiche la liste des recettes dont le titre correspond à la recherche
     *
     * @param Request $request
     * @return $this
     */
    public function rechercherRecette(Request $request)
    {
        $search = $request->get('search', "");

        $recettes = Recette::where('titre', 'LIKE', '%' . $search . '%')->get();

        return view('commun.resultats_recherche_recette')
            ->with('recettes', $recettes)
            ->with('search', $search);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle recette
     *
     * @return \Illuminate\View\View
     */
    public function afficherCreerRecette()
    {
        return view('membre.recettes.creer_recette');
    }

    /**
     * Création d'une nouvelle recette
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function creerRecette(Request $request)
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
            $recette->categorie()->associate($request->categorie);

            $recette->saveOrFail();

            DB::commit();
            \Session::flash("success", "Recette ajoutée avec succès");

            return redirect()->route('recettes.etapes.ajout', [
                'recette' => $recette
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // Si une erreur est survenue mais que le fichier a été sauvegardé, on le supprime
            if (!empty($chemin) && Storage::exists($chemin)) {
                Storage::delete($chemin);
            }
            \Session::flash("error", "Une erreur est survenue ({$e->getMessage()}");

            return redirect()->back()->withInput();
        }


    }

    /**
     * @param Recette $recette
     * @return $this
     */
    public function afficherCreerEtape(Recette $recette)
    {
        return view('membre.recettes.creer_etape')
            ->with('recette', $recette);
    }

    /**
     * @param Recette $recette
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function creerEtape(Recette $recette, Request $request)
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

            \Session::flash("success", "Votre étape à bien été ajoutée à la recette {$recette->titre}");

            // Le formulaire propose d'ajouter une nouvelle étape
            // ou de finaliser la recette
            if ($request->submit == 'autre_etape') {
                return redirect()->route('recettes.etapes.ajout', [
                    'recette' => $recette
                ]);
            } else {
                \Session::flash("success", "Votre recette {$recette->titre} est désormais en ligne");
                return redirect()->route('accueil');
            }
        } catch (\Exception $e) {
            DB::rollback();
            if (!empty($chemin) && Storage::exists($chemin)) {
                Storage::delete($chemin);
            }
            \Session::flash("error", "Une erreur est survenue");

            return redirect()->route("recettes.etapes.ajout", [
                "recette" => $recette
            ]);
        }
    }
}