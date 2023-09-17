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
     *     path="/api/GetSortedComments",
     *     summary="Get sorted comments from my MySql",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function GetSortedComments(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed',
        //     'mobile_number' => 'required',
        // ]);
        
        return response()->json([
            'data' => $this->orderService->GetSortedComments()
        ]);
    }
}
