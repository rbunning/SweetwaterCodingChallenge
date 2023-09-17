<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\OrderServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpectedShipDateController extends Controller
{
    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * @OA\Get(
     *     tags={"UpdateAllExpectedShipDates"},
     *     path="/api/UpdateAllExpectedShipDates",
     *     summary="Parse through all the comment fields in the MySql table to find a expected ship dates.",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function UpdateAllExpectedShipDates(Request $request)
    {
        return response()->json([
            'data' => $this->orderService->UpdateAllExpectedShipDates()
        ]);
    }

    /**
     * @OA\Get(
     *     tags={"UpdateExpectedShipDate"},
     *     path="/api/UpdateExpectedShipDate/{orderId}",
     *     summary="Parse through a comment field in the MySql table to find a expected ship date.",
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
    public function UpdateExpectedShipDate(Request $request, $orderId)
    {
        return response()->json([
            'data' => $this->orderService->UpdateExpectedShipDate($orderId)
        ]);
    }
}
