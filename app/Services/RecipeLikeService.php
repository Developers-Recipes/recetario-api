<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class RecipeLikeService
{
    public function execute(Recipe $recipe, User $user)
    {
        $likes = $recipe->likes;
        $is_liked = false;

        foreach ($likes as $like) {
            if ($like->user_id === $user->id) {
                $is_liked = true;
            }
        }


        if ($is_liked) {
            $recipe->likes()->where('user_id', $user->id)->delete();
        } else {
            $recipe->likes()->create(['user_id' => $user->id]);
        }

        $result = !$is_liked ? 'deleted' : 'created';

        return $result;
    }
}
