<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;

class RecipeMapService
{
    public function execute(Recipe $recipe, User $user)
    {
        //Agregar la cantidad de pasos
        $steps = $recipe->steps;
        $totalSteps = $steps->count();
        $recipe->number_steps = $totalSteps;

        //Agregar progreso de la receta
        $completedSteps = $recipe->steps()->where('completed', 1)->get()->count();
        $progress = $totalSteps === 0 ? 0 : $completedSteps / $totalSteps;
        $recipe->progress = $progress;

        //Agregar la cantidad de likes
        $likes = $recipe->likes;
        $numberLikes =  $likes->count();
        $recipe->number_likes = $numberLikes;

        //Agregar si el usuario actual ha dado like
        $userLikes = $recipe->likes()->where('user_id', $user->id)->get();
        $recipe->is_liked = false;
        if ($userLikes->count() > 0) {
            $recipe->is_liked = true;
        }

        $recipe->is_current = boolval($recipe->is_current);

        return $recipe;
    }
}