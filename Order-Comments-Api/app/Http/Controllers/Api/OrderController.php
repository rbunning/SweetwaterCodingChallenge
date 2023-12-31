<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\OrderServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * @OA\Post(
     *     tags={"CreateOrder"},
     *     path="/api/createOrder",
     *     summary="This more witten to test the $this->parseShipDate($payload['comments']); as part of a create business function.
     *              This does not write unless shipdate_expected has a value since I could not send 0000-00-00 00:00:00 as the default value in the server side with out modifying the db.",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Updated fields for an order.",
     *          @OA\JsonContent(
     *               type="object",
     *               @OA\Property(property="comments", type="string"),
     *               )
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function createOrder(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        return response()->json([
            'data' => $this->orderService->createOrder($payload)
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"UpdateOrder"},
     *     path="/api/updateOrder/{orderId}",
     *     summary="Update and existing order.",
     *    @OA\RequestBody(
     *         required=true,
     *         description="Updated fields for an order.",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="comments", type="string"),
     *              )
     *     ),
     *     @OA\Parameter(
     *         description="ID of Order",
     *         in="path",
     *         name="orderId",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function updateOrder(Request $request, $orderId)
    {
        $payload = json_decode($request->getContent(), true);

        return response()->json([
            'data' => $this->orderService->updateOrder($orderId, $payload)
        ]);
    }
}
