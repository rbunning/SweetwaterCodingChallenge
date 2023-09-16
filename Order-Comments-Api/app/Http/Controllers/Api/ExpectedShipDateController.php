<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpectedShipDateController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"UpdateAllExpectedShipDates"},
     *     path="/api/UpdateAllExpectedShipDates",
     *     summary="Parse through the comments fields in the MySql table to find a Expected Ship Dates",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function UpdateAllExpectedShipDates(Request $request)
    {
        return "hi there1.";
    }
}