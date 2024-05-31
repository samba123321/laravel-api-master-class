<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(): JsonResponse{
        return response()->json([
            'message' => 'Hello again!'
        ], 200);
    }
}
