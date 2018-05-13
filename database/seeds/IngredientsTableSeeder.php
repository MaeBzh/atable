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
            "riz"
        ];

        for ($i = 0; $i < count($ingredients); $i++) {
            $ingredient = new \App\Ingredient();
            $ingredient->nom = $ingredients[$i];
            $ingredient->save();
        }
    }
}
