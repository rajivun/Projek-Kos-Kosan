<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        return response()->json(Kamar::all());
    }
}