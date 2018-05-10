<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $pseudo
 * @property int $actif
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recette[] $recettes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recette[] $recettesFavorites
 * @property-read \App\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePseudo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'pseudo', 'email', 'password', 'actif',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }

    public function isAdmin()
    {
        return $this->role->isAdmin();
    }

    public function isMembre()
    {
        return $this->role->isMembre();
    }

    public function recettesFavorites(){
        return $this->belongsToMany(Recette::class,  'recette_user');
    }

    public function getDossierUser(){
        return "user_".$this->id;
    }
}
