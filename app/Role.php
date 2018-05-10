<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @property int $id
 * @property string $libelle
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    const ADMIN = "admin";
    const MEMBRE = "membre";

    protected $fillable = [
        'libelle',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public static function membre(){
        return self::where('libelle', '=', self::MEMBRE)->first();
    }

    public static function admin(){
        return self::where('libelle', '=', self::ADMIN)->first();
    }

    public function isAdmin(){
        return $this->libelle == self::ADMIN;
    }

    public function isMembre(){
        return $this->libelle == self::MEMBRE;
    }
}
