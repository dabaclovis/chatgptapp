<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    /**
     * Determine whether the user can view any replies.
     */
    public function viewAny(User $user)
    {
        // Example: Allow all authenticated users to view replies
        return $user !== null;
    }

    /**
     * Determine whether the user can view a specific reply.
     */
    public function view(User $user, Reply $reply)
    {
        // Example: Allow viewing if the reply belongs to a comment the user can access
        return true; // Adjust based on your access control requirements
    }

    /**
     * Determine whether the user can create replies.
     */
    public function create(User $user)
    {
        // Example: Allow all authenticated users to create replies
        return $user !== null;
    }

    /**
     * Determine whether the user can update a reply.
     */
    public function update(User $user, Reply $reply)
    {
        // Allow updating only if the user owns the reply
        return $user->id === $reply->repliesable_id;
    }

    /**
     * Determine whether the user can delete a reply.
     */
    public function delete(User $user, Reply $reply)
    {
        // Allow deletion if the user owns the reply or is an admin
        return $user->id === $reply->repliesable_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore a reply.
     */
    public function restore(User $user, Reply $reply)
    {
        // Allow restoring if the user owns the reply
        return $user->id === $reply->repliesable_id;
    }

    /**
     * Determine whether the user can permanently delete a reply.
     */
    public function forceDelete(User $user, Reply $reply)
    {
        // Allow permanent deletion if the user owns the reply or is an admin
        return $user->id === $reply->repliesable_id || $user->role === 'admin';
    }
}
