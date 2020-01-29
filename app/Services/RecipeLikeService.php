<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class RecipeLikeService
{
    public function execute(Recipe $recipe, User $user)
    {
        $likes = $recipe->likes()->where('user_id', $user->id)->get();

        if ($likes->count() > 0) {
            $recipe->likes()->where('user_id', $user->id)->delete();
            $result = 'deleted';
        } else {
            $recipe->likes()->create(['user_id' => $user->id]);
            $result = 'created';
        }

        return $result;
    }
}