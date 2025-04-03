<?php 
namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user can view any comments.
     */
    public function viewAny(User $user)
    {
        // Example: Allow all authenticated users to view any comments.
        return $user !== null;
    }

    /**
     * Determine whether the user can view a specific comment.
     */
    public function view(User $user, Comment $comment)
    {
        // Allow viewing if the comment belongs to a post the user can access
        return true; // Adjust as necessary, e.g., $user->id === $comment->post->user_id
    }

    /**
     * Determine whether the user can create comments.
     */
    public function create(User $user)
    {
        // Allow all authenticated users to create comments
        return $user !== null;
    }

    /**
     * Determine whether the user can update a comment.
     */
    public function update(User $user, Comment $comment)
    {
        // Allow updating if the user owns the comment
        return $user->id === $comment->commentsable_id;
    }

    /**
     * Determine whether the user can delete a comment.
     */
    public function delete(User $user, Comment $comment)
    {
        // Allow deletion if the user owns the comment or is an admin
        return $user->id === $comment->commentsable_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore a comment.
     */
    public function restore(User $user, Comment $comment)
    {
        // Allow restoring if the user owns the comment
        return $user->id === $comment->commentsable_id;
    }

    /**
     * Determine whether the user can permanently delete a comment.
     */
    public function forceDelete(User $user, Comment $comment)
    {
        // Allow permanent deletion if the user owns the comment or is an admin
        return $user->id === $comment->commentsable_id || $user->role === 'admin';
    }
}
