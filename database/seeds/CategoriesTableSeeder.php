s<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //categories principales
        $entrees = \App\Categorie::create([ 'libelle_categorie' => 'entrees']);
        $plats = \App\Categorie::create([ 'libelle_categorie' => 'plats']);
        $desserts = \App\Categorie::create([ 'libelle_categorie' => 'desserts']);
        $soupes = \App\Categorie::create([ 'libelle_categorie' => 'potages']);
        $patisseries = \App\Categorie::create([ 'libelle_categorie' => 'patisseries']);

        //categories secondaires
        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "viande rouge";
        $categorie->categoriePrincipale()->associate($plats);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "viande blanche";
        $categorie->categoriePrincipale()->associate($plats);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "poisson";
        $categorie->categoriePrincipale()->associate($plats);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "vegan";
        $categorie->categoriePrincipale()->associate($plats);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "gateau";
        $categorie->categoriePrincipale()->associate($desserts);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "glace";
        $categorie->categoriePrincipale()->associate($desserts);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "fromage";
        $categorie->categoriePrincipale()->associate($desserts);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "tarte";
        $categorie->categoriePrincipale()->associate($desserts);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "salade";
        $categorie->categoriePrincipale()->associate($entrees);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "crudité";
        $categorie->categoriePrincipale()->associate($entrees);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "eclair";
        $categorie->categoriePrincipale()->associate($patisseries);
        $categorie->save();


        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "velouté";
        $categorie->categoriePrincipale()->associate($soupes);
        $categorie->save();

        $categorie = new \App\Categorie();
        $categorie->libelle_categorie = "soupes";
        $categorie->categoriePrincipale()->associate($soupes);
        $categorie->save();
    }
}
