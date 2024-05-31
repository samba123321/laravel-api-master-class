<?php

namespace App\Traits;

use \Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;

trait ApiResponses {


    protected function ok($message): JsonResponse{
        return $this->success($message, 200);
    }

    protected function success($message, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
}
