<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasTeamPermission($user->currentTeam, 'read')) {
            // The user's role includes the "read" permission...
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Card  $card
     * @return mixed
     */
    public function view(User $user, Card $card)
    {
        if ($user->hasTeamPermission($user->currentTeam, 'read')) {
            // The user's role includes the "read" permission...
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasTeamPermission($user->currentTeam, 'create')) {
            // The user's role includes the "read" permission...
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Card  $card
     * @return mixed
     */
    public function update(User $user, Card $card)
    {
        if ($user->hasTeamPermission($user->currentTeam, 'update')) {
            // The user's role includes the "read" permission...
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Card  $card
     * @return mixed
     */
    public function delete(User $user, Card $card)
    {
        if ($user->hasTeamPermission($user->currentTeam, 'delete')) {
            // The user's role includes the "read" permission...
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Card  $card
     * @return mixed
     */
    public function restore(User $user, Card $card)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Card  $card
     * @return mixed
     */
    public function forceDelete(User $user, Card $card)
    {
        //
    }
}
