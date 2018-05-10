<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Recette
 *
 * @property int $id
 * @property string $titre
 * @property string $nb_pers
 * @property string $photo
 * @property string $prix
 * @property string $difficulte
 * @property string $temps_cuisson
 * @property string $temps_preparation
 * @property string $conseil_presentation
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $auteur
 * @property-read \App\Categorie $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Etape[] $etapes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $likers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereConseilPresentation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereDifficulte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereNbPers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereTempsCuisson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereTempsPreparation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette wherePhoto($value)
 * @property int $auteur_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RecetteDuJour[] $recettesDuJour
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recette whereAuteurId($value)
 */
class Recette extends Model
{
    protected $fillable = [
        'titre',
        'nb_pers',
        'photo',
        'prix',
        'difficulte',
        'temps_cuisson',
        'temps_preparation',
        'conseil_presentation',
    ];

    public function auteur()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recette')->withPivot('quantite', 'unite');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'recette_user');
    }

    public function recettesDuJour()
    {
        return $this->hasMany(RecetteDuJour::class);
    }
    public static function recettesRandom($limit){
        $query = Recette::orderByRaw("RAND()")->limit($limit);
        return $limit == 1 ? $query->first() : $query->get();
    }
}
