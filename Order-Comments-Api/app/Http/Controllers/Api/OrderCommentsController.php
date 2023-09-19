<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\OrderServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderCommentsController extends Controller
{
    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @OA\Get(
     *     tags={"GetSortedComments"},
     *     path="/api/getSortedComments",
     *     summary="Get sorted comments from my MySql.",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function getSortedComments(Request $request)
    {
        return response()->json([
            'data' => $this->orderService->getSortedComments()
        ]);
    }

    /**
     * Get sorted comments from my MySql for frontend UI.
     *
     * @param  Request  $request
     * @return $sortedData
     */
    public function showSortedComments(Request $request)
    {
        $sortedData = $this->orderService->getSortedComments();
        return view('temp', [
            'sortedData' => $sortedData,
        ]);
    }
}
