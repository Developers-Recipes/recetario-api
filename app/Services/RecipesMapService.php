<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\State;
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
                $item->state_id = State::getPendigState()->id;
            } elseif ($progress > 0 && $progress < 1) {
                $item->state_id = State::getInProgressState()->id;
            } else {
                $item->state_id = State::getReadyState()->id;
            }

            //Cantidad de likes de la receta
            $likes = $item->likes;
            $item->number_likes = $likes->count();

            //Validar si el usuario a dado like a la receta
            $item->is_liked = false;
            $userLikes = $item->likes()->where('user_id', $user->id)->get();
            if ($userLikes->count() > 0) {
                $item->is_liked = true;
            }
            unset($item->likes);

            $item->is_current = boolval($item->is_current);

            return $item;
        });


        return $paginate;
    }
}