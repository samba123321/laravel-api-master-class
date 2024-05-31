<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    use ApiResponses;

    #[OA\Get(
        path: "/api/login",
        description: "Login endpoint for users",
        summary: "User login",
        tags: ["Authentication"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Login successful",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "message", type: "string", example: "Hello again!"),
                        new OA\Property(property: "status", type: "integer", example: 200)
                    ]
                )
            ),
            new OA\Response(response: 401, description: "Unauthorized"),
            new OA\Response(response: 500, description: "Server Error")
        ]
    )]
    public function login(): JsonResponse{
        return $this->ok('Hello again!',200);
    }
}
