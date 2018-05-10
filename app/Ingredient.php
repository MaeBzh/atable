<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ingredient
 *
 * @property int $id
 * @property string $nom
 * @property string $icone
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recette[] $recettes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereIcone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ingredient extends Model
{
    protected $fillable = [
        'nom', 'icone',
    ];

    public function recettes(){
        return $this->belongsToMany(Recette::class, 'ingredient_recette')->withPivot('quantite', 'unite');

    }
}
