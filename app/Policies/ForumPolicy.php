<?php

namespace App\Policies;

class ForumPolicy
{
    public function createCategories($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    public function manageCategories($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $this->moveCategories($user) ||
            $this->renameCategories($user);
    }

    public function moveCategories($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    public function renameCategories($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    public function markThreadsAsRead($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return true;
    }

    public function viewTrashedThreads($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return true;
    }

    public function viewTrashedPosts($user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }
}
