<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCorrespondingUserProfile
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
         $userProfile = new UserProfile();
         $userProfile->id=$event->user->id;
    }
}
