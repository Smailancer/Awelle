<?php

namespace App\Policies;

use App\Models\User;
use App\Models\word;
use Illuminate\Auth\Access\Response;

class WordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, word $word): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */


    public function update(User $user, Word $word): bool
    {
        return $user->id === $word->user_id || $user->isAdmin();
    }



    public function edit(User $user, Word $word): bool
    {
        return $this->update($user, $word);
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, word $word): bool
    {
        return $user->id === $word->user_id || $user->isAdmin();

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, word $word): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, word $word): bool
    {
        //
    }
}
