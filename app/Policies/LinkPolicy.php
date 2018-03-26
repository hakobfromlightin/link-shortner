<?php

namespace App\Policies;

use App\Link;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can delete the activity.
     *
     * @param  \App\User $user
     * @param  \App\Link $link
     * @return mixed
     */
    public function delete(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }
}
