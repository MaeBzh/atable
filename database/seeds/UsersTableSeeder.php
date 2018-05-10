<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nb_user = 10;

        for ($i = 0; $i < $nb_user; $i++) {
            $user = new \App\User();
            $user->nom = "nom{$i}";
            $user->prenom = "prenom{$i}";
            $user->pseudo = "pseudo{$i}";
            $user->actif = true;
            $user->email = "email{$i}@yopmail.com";
            $user->password = bcrypt("password");

            $role = \App\Role::membre();
            $user->role()->associate($role);
            $user->save();

            event(new \App\Events\UserInscription($user));
        }

        $user = new \App\User();
        $user->nom = "nom_admin";
        $user->prenom = "prenom_admin";
        $user->pseudo = "admin";
        $user->actif = true;
        $user->email = "admin@yopmail.com";
        $user->password = bcrypt("password");

        $role = \App\Role::admin();
        $user->role()->associate($role);
        $user->save();

        event(new \App\Events\UserInscription($user));
    }
}
