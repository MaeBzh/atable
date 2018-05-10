<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Etape
 *
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property int $recette_id
 * @property int|null $photo_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photo
 * @property-read \App\Recette $recette
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereRecetteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Etape wherePhoto($value)
 */
class Etape extends Model
{
    protected $fillable = [
        'titre', 'photo', 'description',
    ];

    public function recette(){
        return $this->belongsTo(Recette::class);
    }
}
