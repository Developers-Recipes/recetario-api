<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipesCollection extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'code' => 200,
            'data' => $this->collection
        ];
    }
}