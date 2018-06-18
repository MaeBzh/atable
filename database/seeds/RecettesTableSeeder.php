<?php

use Illuminate\Database\Seeder;

class RecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prix = [
            "bon marché",
            "moyen",
            "cher",
        ];

        $difficulte = [
            "facile",
            "moyen",
            "difficile",
        ];


        foreach (\App\Categorie::categoriesPrincipales() as $categorie) {
            foreach ($categorie->sousCategories()->get() as $sous_categorie) {
                $nb_recette = rand(1, 10);

                for ($i = 0; $i < $nb_recette; $i++) {

                    $user = \App\User::inRandomOrder()->first();

                    $recette = new \App\Recette();
                    $recette->titre = "$sous_categorie->libelle_categorie $i";
                    $recette->nb_pers = rand(2, 6);
                    $recette->photo = "seed/recettes/$i.jpg";
                    $recette->prix = $prix[rand(0, count($prix) - 1)];
                    $recette->difficulte = $difficulte[rand(0, count($difficulte) - 1)];
                    $recette->temps_cuisson = rand(0, 1) . ":" . rand(0, 59) . "" . "";
                    $recette->temps_preparation = rand(0, 1) . ":" . rand(0, 59) . "" . "";
                    $recette->conseil_presentation = "Un conseil de présentation super utile";

                    $recette->auteur()->associate($user);
                    $recette->categorie()->associate($sous_categorie);
                    $recette->save();

                    $unites = [
                        'l',
                        'cl',
                        'ml',
                        'kg',
                        'g',
                        'mg',
                        'cs',
                        'cc'
                    ];

                    $ingredients = \App\Ingredient::inRandomOrder()->limit(rand(5, 10))->get();
                    foreach ($ingredients as $ingredient) {
                        $recette->ingredients()->attach($ingredient, [
                            'quantite' => rand(1, 100),
                            'unite' => $unites[rand(0, count($unites) - 1)]
                        ]);
                    }

                    $nb_etapes = rand(1, 6);
                    for ($j = 0; $j < $nb_etapes; $j++) {
                        $etape = new \App\Etape();
                        $etape->titre = "Etape {$j}";
                        if ($rand = rand(1, 6) < 4) {
                            $etape->photo = "seed/etapes/{$rand}.jpg";
                        }
                        $etape->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim eros, 
                fringilla quis augue eget, consectetur finibus justo. Donec porttitor fermentum facilisis. 
                Etiam fringilla dapibus purus, egestas consequat elit. Etiam tempor sem vel ligula consequat aliquet.
                Aliquam pulvinar semper dui, quis tristique elit aliquet in. Donec vitae fermentum sapien";

                        $recette = \App\Recette::inRandomOrder()->first();
                        $etape->recette()->associate($recette);
                        $etape->save();
                    }

                }
            }
        }

    }
}
