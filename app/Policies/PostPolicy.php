<?php

namespace App\Policies;

use TeamTeaTime\Forum\Models\Post;

class PostPolicy
{
    public function edit($user, Post $post): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $post->author_id;
    }

    public function delete($user, Post $post): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $post->author_id;
    }

    public function restore($user, Post $post): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->getKey() === $post->author_id;
    }
}
