<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @OA\Post(
     *     tags={"CreateOrder"},
     *     path="/api/CreateOrder",
     *     summary="Create an order.",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function CreateOrder(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed',
        //     'mobile_number' => 'required',
        // ]);

        return "hi there2.";
    }

        /**
     * @OA\Post(
     *     tags={"UpdateOrder"},
     *     path="/api/UpdateOrder",
     *     summary="Update and existing order.",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function UpdateOrder(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed',
        //     'mobile_number' => 'required',
        // ]);
        
        return "hi there3.";
    }
}
