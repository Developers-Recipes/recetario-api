<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Resources\Recipe\RecipeResource;
use App\Http\Resources\Recipe\RecipesCollection;
use App\Models\Recipe;
use App\Services\ForkRecipe;
use App\Services\RecipeCollectionMap;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pages = 10, RecipeCollectionMap $action)
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
    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
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
}