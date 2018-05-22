<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\RecetteDuJour
 *
 * @property-read \App\Recette $recette
 * @mixin \Eloquent
 */
class RecetteDuJour extends Model
{
    protected $table = "recette_du_jour";
    protected $fillable = [
        'date',
    ];

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public static function recetteDuJour(){
        $date_du_jour = Carbon::today();

        $recette_du_jour = RecetteDuJour::where('date', $date_du_jour)->first();
        if(empty($recette_du_jour)){
            $recette = Recette::recettesRandom(1);

            $recette_du_jour = new RecetteDuJour();
            $recette_du_jour->date = $date_du_jour;
            $recette_du_jour->recette()->associate($recette);
            $recette_du_jour->save();
        }
        return $recette_du_jour;
    }

}
