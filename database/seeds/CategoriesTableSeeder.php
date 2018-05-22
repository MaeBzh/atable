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

        //categories secondaires
        $viande = new \App\Categorie();
        $viande->libelle_categorie = "viande";
        $viande->categoriePrincipale()->associate($plats);
        $viande->save();

        $gateau = new \App\Categorie();
        $gateau->libelle_categorie = "gateau";
        $gateau->categoriePrincipale()->associate($desserts);
        $gateau->save();

        $salade = new \App\Categorie();
        $salade->libelle_categorie = "salade";
        $salade->categoriePrincipale()->associate($entrees);
        $salade->save();


    }
}
