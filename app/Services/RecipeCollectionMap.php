<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use phpDocumentor\Reflection\Types\Boolean;

class RecipeCollectionMap
{
    public function execute(LengthAwarePaginator $paginate, User $user): LengthAwarePaginator
    {
        //is_liked
        //progress
        //steps

        $paginate->getCollection()->map(function (Recipe $item) use ($user) {
            //Agregar el numero de pasos
            $steps = $item->steps;
            $totalSteps = $steps->count();
            $item->number_steps = $totalSteps;
            unset($item->steps);

            //Progreso
            $completedSteps = $steps->where('completed', 1)->count();
            $item->progress = $completedSteps / $totalSteps;

            //Cantidad de likes de la receta
            $likes = $item->likes;
            $item->number_likes = $likes->count();
            $item->is_liked = 0;

            //Validar si el usuario a dado like a la receta
            foreach ($likes as $like) {
                if ($like->user_id === $user->id) {
                    $item->is_liked = 1;
                    unset($item->likes);
                    return;
                }
            }
            unset($item->likes);
            return $item;
        });


        return $paginate;
    }

    private function isLiked($like, $user)
    {
        return $like->user_id === $user->id;
    }
}