<?php

use Illuminate\Database\Seeder;

class EtapesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::inRandomOrder()->first();

        if (DB::table('etapes')->count() == 0) {
            $nb_etapes = 20;

            for ($i = 0; $i < $nb_etapes; $i++) {
                $etape = new \App\Etape();
                $etape->titre = "Etape {$i}";
                $etape->photo ="user_{$user->id}/photo_recette.jpg";
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
