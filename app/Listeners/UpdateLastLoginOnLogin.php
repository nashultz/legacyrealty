<?php

namespace Legacy\Listeners;

use Carbon\Carbon;

class UpdateLastLoginOnLogin
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle($user, $remember)
    {
        $user->last_login_at = Carbon::now();

        $user->save();
    }
}
