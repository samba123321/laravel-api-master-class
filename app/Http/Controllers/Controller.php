<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

#[OA\Info(version: "1.0.0", description: "Your API Description", title: "Your API Title")]
#[OA\Server(url: 'http://127.0.0.1:8000', description: "Local server")]
#[OA\SecurityScheme(securityScheme: 'bearerAuth', type: "http", name: "Authorization", in: "header", scheme: "bearer")]
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
