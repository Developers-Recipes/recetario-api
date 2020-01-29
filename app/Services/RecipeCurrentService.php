<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class RecipeCurrentService
{
    public function execute(Recipe $recipe, User $user)
    {

        if ($recipe->user_id === $user->id) {

            $current = $recipe->is_current;
            $recipe->is_current = !$current;

            if ($recipe->save()) {
                $result = [
                    'status' => 'success',
                    'code' => 200,
                    'message' => $recipe->is_current ? 'This is the current recipe'
                        : 'This isn´t the current recipe'
                ];
            }
        } else {
            $result = [
                'status' => 'error',
                'code' => 401,
                'message' => 'This recipe does not belong to you'
            ];
        }

        return $result;
    }
}