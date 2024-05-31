<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;
use App\Models\Ticket;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class TicketController extends Controller
{

    use ApiResponses;


    #[OA\Get(
        path: "/api/v1/tickets",
        description: "Get all tickets",
        summary: "Get all tickets",
        tags: ["Tickets"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Tickets retrieved successfully",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(
                        properties: [
                            new OA\Property(property: "id", type: "integer", example: 1),
                            new OA\Property(property: "title", type: "string", example: "Ticket Title"),
                            new OA\Property(property: "description", type: "string", example: "Ticket Description"),
                        ]
                    )
                )
            ),
            new OA\Response(response: 401, description: "Unauthorized"),
            new OA\Response(response: 500, description: "Server Error")
        ]
    )]
    public function index(): JsonResponse
    {
        return $this->success(Ticket::all(), 200);
    }

//    #[OA\Post(
//        path: "/api/v1/tickets",
//        description: "Create a new ticket",
//        summary: "Create a new ticket",
//        requestBody: new OA\RequestBody(
//            required: true,
//            content: new OA\JsonContent(
//                properties: [
//                    new OA\Property(property: "title", type: "string", example: "New Ticket Title"),
//                    new OA\Property(property: "description", type: "string", example: "New Ticket Description"),
//                ]
//            )
//        ),
//        tags: ["Tickets"],
//        responses: [
//            new OA\Response(
//                response: 201,
//                description: "Ticket created successfully",
//                content: new OA\JsonContent(
//                    properties: [
//                        new OA\Property(property: "message", type: "string", example: "Ticket created successfully"),
//                        new OA\Property(property: "status", type: "integer", example: 201)
//                    ]
//                )
//            ),
//            new OA\Response(response: 400, description: "Bad Request"),
//            new OA\Response(response: 401, description: "Unauthorized"),
//            new OA\Response(response: 500, description: "Server Error")
//        ]
//    )]
//    public function store(Request $request): JsonResponse
//    {
//        $ticket = Ticket::create($request->all());
//        return $this->created('Ticket created successfully');
//    }
//
//    #[OA\Get(
//        path: "/api/v1/tickets/{id}",
//        description: "Get a ticket by ID",
//        summary: "Get a ticket by ID",
//        tags: ["Tickets"],
//        parameters: [
//            new OA\Parameter(
//                name: "id",
//                description: "Ticket ID",
//                in: "path",
//                required: true,
//                schema: new OA\Schema(type: "integer")
//            )
//        ],
//        responses: [
//            new OA\Response(
//                response: 200,
//                description: "Ticket retrieved successfully",
//                content: new OA\JsonContent(
//                    properties: [
//                        new OA\Property(property: "id", type: "integer", example: 1),
//                        new OA\Property(property: "title", type: "string", example: "Ticket Title"),
//                        new OA\Property(property: "description", type: "string", example: "Ticket Description"),
//                    ]
//                )
//            ),
//            new OA\Response(response: 404, description: "Not Found"),
//            new OA\Response(response: 401, description: "Unauthorized"),
//            new OA\Response(response: 500, description: "Server Error")
//        ]
//    )]
//    public function show($id): JsonResponse
//    {
//        $ticket = Ticket::find($id);
//        if (!$ticket) {
//            return $this->notFound('Ticket not found');
//        }
//        return $this->success($ticket, 200);
//    }
//
//    #[OA\Patch(
//        path: "/api/v1/tickets/{id}",
//        description: "Update a ticket",
//        summary: "Update a ticket",
//        requestBody: new OA\RequestBody(
//            required: true,
//            content: new OA\JsonContent(
//                properties: [
//                    new OA\Property(property: "title", type: "string", example: "Updated Ticket Title"),
//                    new OA\Property(property: "description", type: "string", example: "Updated Ticket Description"),
//                ]
//            )
//        ),
//        tags: ["Tickets"],
//        parameters: [
//            new OA\Parameter(
//                name: "id",
//                description: "Ticket ID",
//                in: "path",
//                required: true,
//                schema: new OA\Schema(type: "integer")
//            )
//        ],
//        responses: [
//            new OA\Response(
//                response: 200,
//                description: "Ticket updated successfully",
//                content: new OA\JsonContent(
//                    properties: [
//                        new OA\Property(property: "message", type: "string", example: "Ticket updated successfully"),
//                        new OA\Property(property: "status", type: "integer", example: 200)
//                    ]
//                )
//            ),
//            new OA\Response(response: 404, description: "Not Found"),
//            new OA\Response(response: 400, description: "Bad Request"),
//            new OA\Response(response: 401, description: "Unauthorized"),
//            new OA\Response(response: 500, description: "Server Error")
//        ]
//    )]
//    public function update(Request $request, $id): JsonResponse
//    {
//        $ticket = Ticket::find($id);
//        if (!$ticket) {
//            return $this->notFound('Ticket not found');
//        }
//        $ticket->update($request->all());
//        return $this->ok('Ticket updated successfully');
//    }
//
//    #[OA\Delete(
//        path: "/api/v1/tickets/{id}",
//        description: "Delete a ticket",
//        summary: "Delete a ticket",
//        tags: ["Tickets"],
//        parameters: [
//            new OA\Parameter(
//                name: "id",
//                description: "Ticket ID",
//                in: "path",
//                required: true,
//                schema: new OA\Schema(type: "integer")
//            )
//        ],
//        responses: [
//            new OA\Response(
//                response: 204,
//                description: "Ticket deleted successfully"
//            ),
//            new OA\Response(response: 404, description: "Not Found"),
//            new OA\Response(response: 401, description: "Unauthorized"),
//            new OA\Response(response: 500, description: "Server Error")
//        ]
//    )]
//    public function destroy($id): JsonResponse
//    {
//        $ticket = Ticket::find($id);
//        if (!$ticket) {
//            return $this->notFound('Ticket not found');
//        }
//        $ticket->delete();
//        return $this->noContent();
//    }
}
