<?php

namespace cacoma\Policies;

use cacoma\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        //
		//return $user->role_id === 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \cacoma\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
		//return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
		//return $user->role_id === 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
		//return $user->role_id === 1;
    }
}
