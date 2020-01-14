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

    protected function errorResponse($message = 'success', $code = 200)
    {
        return response()->json(['code' => $code, 'message' => $message], $code);
    }

    protected function showAll(Collection $collection, $message = 'success', $code = 200)
    {
        return $this->successResponse(['code' => $code, 'message' => $message, 'result' => $collection], $code);
    }

    protected function showOne(Model $instance, $message = 'success', $code = 200)
    {
        return $this->successResponse(['code' => $code, 'message' => $message, 'result' => $instance], $code);
    }
}
