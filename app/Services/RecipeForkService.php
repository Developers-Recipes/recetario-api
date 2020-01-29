<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class ForkRecipe
{

    public function execute(Recipe $recipe, User $user): Recipe
    {

        $forkRecipe = $user->recipes()->create([
            'forked_from' => $recipe->id,
            'name' => $recipe->name,
            'description' => $recipe->description,
            'state_id' => 1,
        ]);

        $steps = $recipe->steps;

        foreach ($steps as $step) {
            $forkRecipe->steps()->create([
                'number_step' => $step->number_step,
                'name' => $step->name,
                'description' => $step->description,
                'link' => $step->link,
                'completed' => 0,
            ]);
        }

        return $forkRecipe;
    }
}