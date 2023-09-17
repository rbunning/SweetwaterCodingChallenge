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
     *     path="/api/updateAllExpectedShipDates",
     *     summary="Parse through all the comment fields in the MySql table to find a expected ship dates.",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function updateAllExpectedShipDates(Request $request)
    {
        return response()->json([
            'data' => $this->orderService->updateAllExpectedShipDates()
        ]);
    }

    /**
     * @OA\Get(
     *     tags={"UpdateExpectedShipDate"},
     *     path="/api/updateExpectedShipDate/{orderId}",
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
    public function updateExpectedShipDate(Request $request, $orderId)
    {
        return response()->json([
            'data' => $this->orderService->updateExpectedShipDate($orderId)
        ]);
    }
}
