<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{

    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $message = 'success', $code = 200)
    {
        return $this->successResponse(['message' => $message, 'result' => $collection], $code);
    }

    protected function showOne(Model $instance, $message = 'success', $code = 200)
    {
        return $this->successResponse(['message' => $message, 'result' => $instance], $code);
    }
}