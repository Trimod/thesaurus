<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * @param     $data
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, int $code = Response::HTTP_OK): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * @param $message
     * @param $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code): \Illuminate\Http\JsonResponse
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}
