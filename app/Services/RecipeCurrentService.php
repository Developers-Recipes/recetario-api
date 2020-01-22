<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class RecipeCurrentService
{
    public function execute(Recipe $recipe)
    {
        $current = $recipe->is_current;
        $recipe->is_current = !$current;

        if ($recipe->save()) {
            $result = $recipe->is_current ? 'This is the current recipe'
                : 'This isn´t the current recipe';
        }

        return $result;
    }
}