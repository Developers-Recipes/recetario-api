<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'data' => [
                'access_token' => $this->resource['access_token'],
                'token_type'   => $this->resource['token_type'],
                'expires_at'   => $this->resource['expires_at']
            ]
        ];
    }
}
