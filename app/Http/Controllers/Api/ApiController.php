<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\RequestController;
use App\Models\Api;
use Illuminate\Http\Request;
use App\Http\Resources\ResourceApi;

class ApiController extends RequestController
{
    public function index()
    {
        return $this->showAll(Api::all());
    }
}
