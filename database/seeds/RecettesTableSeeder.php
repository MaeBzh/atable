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

        $nb_recette = 10;

        for ($i = 0; $i < $nb_recette; $i++) {

            $user = \App\User::inRandomOrder()->first();
            $categorie = App\Categorie::inRandomOrder()->first();

            if(!Storage::disk('public')->exists("user_{$user->id}/photo_recette.jpg")) {
                Storage::disk('public')->copy("seed/photo_recette.jpg", "user_{$user->id}/photo_recette.jpg");
            }

            $recette = new \App\Recette();
            $recette->titre = "titre{$i}";
            $recette->nb_pers = rand(2, 6);
            $recette->photo = "user_{$user->id}/photo_recette.jpg";
            $recette->prix = $prix[rand(0, count($prix) - 1)];
            $recette->difficulte = $difficulte[rand(0, count($difficulte) - 1)];
            $recette->temps_cuisson = rand(0, 1).":".rand(0, 59).""."";
            $recette->temps_preparation = rand(0, 1).":".rand(0, 59).""."";
            $recette->conseil_presentation = "Un conseil de présentation super utile";

            $recette->auteur()->associate($user);
            $recette->categorie()->associate($categorie);
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

        }
    }
}
