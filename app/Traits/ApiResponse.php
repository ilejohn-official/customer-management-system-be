<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a standardized success response.
     */
    public function successResponse($data, string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return a standardized error response.
     */
    public function errorResponse(string $message, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'message' => $message
        ], $statusCode);
    }
}
