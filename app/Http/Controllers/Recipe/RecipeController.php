<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Http\Resources\Recipe\RecipeResource;
use App\Http\Resources\Recipe\RecipesCollection;
use App\Models\Recipe;
use App\Services\ForkRecipe;
use App\Services\RecipeCurrentService;
use App\Services\RecipeLikeService;
use App\Services\RecipeMutatorService;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pages = 10, RecipeMutatorService $action)
    {
        $recipes = Recipe::paginate($pages);
        $newRecipes = $action->execute($recipes, auth()->user());

        return new RecipesCollection($newRecipes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, RecipeMutatorService $action)
    {
        $result = $action->execute($recipe, auth()->user());
        return new RecipeResource($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }

    public function fork(Recipe $recipe, ForkRecipe $action)
    {
        $result = $action->execute($recipe, auth()->user());
        return new RecipeResource($result);
    }

    public function like(Recipe $recipe, RecipeLikeService $action)
    {
        $result = $action->execute($recipe, auth()->user());

        $data = [
            'status' => 'success',
            'code' => 200,
            'message' => 'This like has beed ' . $result . ' successfully.'
        ];

        return new MessageResource($data);
    }

    public function current(Recipe $recipe, RecipeCurrentService $action)
    {
        $result = $action->execute($recipe, auth()->user());

        return new MessageResource($result);
    }
}