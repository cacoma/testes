<?php

namespace cacoma\Policies;

use cacoma\User;
use cacoma\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\Post  $post
     * @return mixed
     */
    public function view(User $user, Invest $invest)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \cacoma\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\Post  $post
     * @return mixed
     */
    public function update(User $user, Invest $invest)
    {
        //
        return $user->id === $invest->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \cacoma\User  $user
     * @param  \cacoma\Post  $post
     * @return mixed
     */
    public function delete(User $user, Invest $invest)
    {
        //
         return $user->id === $comment->author_id;
    }
}
