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
     *     summary="Create an order.",
     *      @OA\Parameter(
     *         name="Comment",
     *         in="query",
     *         description="Order Comment.",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function createOrder(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed',
        //     'mobile_number' => 'required',
        // ]);

        return response()->json([
            'data' => $this->orderService->CreateOrder($payload)
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"UpdateOrder"},
     *     path="/api/updateOrder/{orderId}",
     *     summary="Update and existing order.",
     *      @OA\Parameter(
     *         name="comments",
     *         in="query",
     *         description="Order Comment.",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         description="ID of Order",
     *         in="path",
     *         name="orderId",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function updateOrder(Request $request, $orderId)
    {
        $payload = json_decode($request->getContent(), true);

        $orderDetails = [
            'Comments' => $payload['comments']
        ];

        return response()->json([
            'data' => $this->orderService->UpdateOrder($orderId, $orderDetails)
        ]);
    }
}
