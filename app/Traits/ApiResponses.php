<?php

namespace App\Traits;

use \Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;

trait ApiResponses {

    protected function success($message, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }


    protected function ok($message): JsonResponse{
        return $this->success($message, 200);
    }

    protected function created($message): JsonResponse
    {
        return $this->success($message, 201);
    }

    protected function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    protected function badRequest($message): JsonResponse
    {
        return $this->error($message, 400);
    }

    protected function forbidden($message = 'Forbidden'): JsonResponse
    {
        return $this->error($message, 403);
    }

    protected function notFound($message = 'Not Found'): JsonResponse
    {
        return $this->error($message, 404);
    }

    protected function conflict($message): JsonResponse
    {
        return $this->error($message, 409);
    }

    protected function unprocessable($message): JsonResponse
    {
        return $this->error($message, 422);
    }

    protected function serverError($message = 'Internal Server Error'): JsonResponse
    {
        return $this->error($message, 500);
    }


    protected function error($message, $statusCode): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

}
