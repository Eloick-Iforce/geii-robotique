<?php

namespace App\Policies;

use TeamTeaTime\Forum\Models\Thread;

class ThreadPolicy
{
    public function view($user, Thread $thread): bool
    {
        return true;
    }

    public function deletePosts($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    public function restorePosts($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    public function rename($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $thread->author_id;
    }

    public function reply($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return !$thread->locked;
    }

    public function delete($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $thread->author_id;
    }

    public function restore($user, Thread $thread): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $thread->author_id;
    }
}
