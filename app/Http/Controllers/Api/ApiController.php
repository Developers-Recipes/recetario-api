<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\RequestController;
use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends RequestController
{
    public function index()
    {
        $version = Api::all();
        return $this->showAll($version);
    }
}
