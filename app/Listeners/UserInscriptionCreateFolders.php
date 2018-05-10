<?php

namespace App\Listeners;

use App\Events\UserInscription;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInscriptionCreateFolders
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserInscription  $event
     * @return void
     */
    public function handle(UserInscription $event)
    {
        $user = $event->user;
        $dossier_user = $user->getDossierUser();
        \Storage::makeDirectory($dossier_user);
    }
}
