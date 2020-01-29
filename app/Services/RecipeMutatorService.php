<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\RecipesMapService;
use App\Services\RecipeMapService;

class RecipeMutatorService
{
    public function execute($instance, User $user)
    {
        $data = null;

        if ($instance instanceof LengthAwarePaginator) {
            $map = new RecipesMapService();
            $data = $map->execute($instance, $user);
        } elseif ($instance instanceof Recipe) {
            $map = new RecipeMapService();
            $data = $map->execute($instance, $user);
        }

        return $data;
    }
}