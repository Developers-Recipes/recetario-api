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

<<<<<<< HEAD
    protected function errorResponse($message, $code = 400)
=======
    protected function errorResponse($message = 'success', $code = 200)
>>>>>>> 3e09e2183007c97a7fdb05e4154cbb34f1706d79
    {
        return response()->json(['code' => $code, 'message' => $message], $code);
    }

    protected function showAll(Collection $collection,  $code = 200, $message = 'success')
    {
        return $this->successResponse(['code' => $code, 'message' => $message, 'result' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200, $message = 'success')
    {
        return $this->successResponse(['code' => $code, 'message' => $message, 'result' => $instance], $code);
<<<<<<< HEAD
    }

    protected function messageResponse($message = 'success', $code = 200)
    {
        return $this->successResponse(['code' => $code, 'message' => $message], $code);
=======
>>>>>>> 3e09e2183007c97a7fdb05e4154cbb34f1706d79
    }
}
