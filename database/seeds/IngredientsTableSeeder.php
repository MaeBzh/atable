<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ingredients = [
            "tomate",
            "banane",
            "crème",
            "concombre",
            "chocolat",
            "fromage de chèvre",
            "noix",
            "courgette",
            "sel",
            "riz",
            "pomme de terre",
            "lait",
            "citron",
            "oignon",
            "ail",
            "thym",
            "curry",
            "eau",
            "poivre",
            "oeuf"
        ];

        for ($i = 0; $i < count($ingredients); $i++) {
            $ingredient = new \App\Ingredient();
            $ingredient->nom = $ingredients[$i];
            $ingredient->save();
        }
    }
}
