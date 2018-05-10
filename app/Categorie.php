<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Categorie
 *
 * @property int $id
 * @property string $titre
 * @property int|null $categorie_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Categorie $categoriePrincipale
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recette[] $recettes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Categorie[] $sousCategories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $libelle_categorie
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereLibelleCategorie($value)
 */
class Categorie extends Model
{
    protected $fillable = [
        'libelle_categorie', 'categorie_id'
    ];

    public function recettes(){
        return $this->hasMany(Recette::class);
    }

    public function sousCategories(){
        return $this->hasMany(Categorie::class);
    }

    public function categoriePrincipale(){
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public static function categoriesPrincipales(){
        return Categorie::whereNull("categorie_id")->get();
    }

}
