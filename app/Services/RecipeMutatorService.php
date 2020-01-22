<?php

namespace App\Services;

use App\Models\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\RecipesMapService;

class RecipeMutatorService
{
    public function execute($instance)
    {
        $data = null;

        if ($instance instanceof LengthAwarePaginator) {
            $map = new RecipesMapService();
            $data = $map->execute($instance, auth()->user());
        } elseif ($instance instanceof Recipe) {
        }

        return $data;
    }
}