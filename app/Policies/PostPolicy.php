<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    // public function create(User $user)
    // {
    //     return $user->status == 0;
    // }

    // public function update(User $user, Post $post)
    // {
    //     return $user->status == 0;
    // }

    // public function delete(User $user)
    // {
    //     return $user->status == 0;
    // }
}
