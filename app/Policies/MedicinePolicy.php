<?php

namespace App\Policies;

use App\User;
use App\medicine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicinePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any medicines.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the medicine.
     *
     * @param  \App\User  $user
     * @param  \App\medicine  $medicine
     * @return mixed
     */
    public function view(User $user, medicine $medicine)
    {
        //
    }

    /**
     * Determine whether the user can create medicines.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->privilege === 'Owner';
    }

    /**
     * Determine whether the user can update the medicine.
     *
     * @param  \App\User  $user
     * @param  \App\medicine  $medicine
     * @return mixed
     */
    public function update(User $user)
    {
        return in_array($user->privilege,[
            'Owner',
            'Cashier'
        ]);
    }

    /**
     * Determine whether the user can delete the medicine.
     *
     * @param  \App\User  $user
     * @param  \App\medicine  $medicine
     * @return mixed
     */
    public function delete(User $user)
    {
        return in_array($user->privilege,[
            'Owner',
            'Cashier'
        ]);
    }

    /**
     * Determine whether the user can restore the medicine.
     *
     * @param  \App\User  $user
     * @param  \App\medicine  $medicine
     * @return mixed
     */
    public function restore(User $user, medicine $medicine)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the medicine.
     *
     * @param  \App\User  $user
     * @param  \App\medicine  $medicine
     * @return mixed
     */
    public function forceDelete(User $user, medicine $medicine)
    {
        //
    }
}
