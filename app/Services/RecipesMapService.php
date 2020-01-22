<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipesMapService
{
    public function execute(LengthAwarePaginator $paginate, User $user): LengthAwarePaginator
    {

        $paginate->getCollection()->map(function (Recipe $item) use ($user) {
            //Agregar el numero de pasos
            $steps = $item->steps;
            $totalSteps = $steps->count();
            $item->number_steps = $totalSteps;
            unset($item->steps);

            //Progreso
            $completedSteps = $steps->where('completed', 1)->count();
            $progress = $totalSteps == 0 ? 0 : $completedSteps / $totalSteps;
            $item->progress = $progress;

            //Estado actual de la receta: pending - in progress - ready
            if ($progress == 0) {
                $item->state_id = 1;
            } elseif ($progress > 0 && $progress < 1) {
                $item->state_id = 2;
            } else {
                $item->state_id = 3;
            }

            //Cantidad de likes de la receta
            $likes = $item->likes;
            $item->number_likes = $likes->count();
            $item->is_liked = false;

            //Validar si el usuario a dado like a la receta
            foreach ($likes as $like) {
                if ($like->user_id === $user->id) {
                    $item->is_liked = true;
                    continue;
                }
            }
            unset($item->likes);

            $item->is_current = boolval($item->is_current);

            return $item;
        });


        return $paginate;
    }
}