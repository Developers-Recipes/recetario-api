<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'status' => 'succes',
            'code' => 200,
            'data' => [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'forked_from' => $this->forked_from,
                'state_id' => $this->state_id,
                'name' => $this->name,
                'description' => $this->description,
                'is_current' => $this->is_current,
                'likes' => $this->likes,
            ]
        ];
    }
}