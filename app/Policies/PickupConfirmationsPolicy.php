<?php

namespace App\Policies;

use App\Models\User;
use App\Models\pickup_confirmations;
use Illuminate\Auth\Access\Response;

class PickupConfirmationsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, pickup_confirmations $pickupConfirmations): bool
    {
        //
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
    public function update(User $user, pickup_confirmations $pickupConfirmations): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, pickup_confirmations $pickupConfirmations): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, pickup_confirmations $pickupConfirmations): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, pickup_confirmations $pickupConfirmations): bool
    {
        //
    }
}
