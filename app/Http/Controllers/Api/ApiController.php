<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $version = Api::all();

        return response()->json($version, 200);
    }
}