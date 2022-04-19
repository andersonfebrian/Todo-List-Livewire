<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
  public function success($data = [], $message = '', $code = 200): JsonResponse
  {
    return response()->json([
      'success' => true,
      'code' => $code,
      'message' => $message,
      'data' => $data,
    ], $code);
  }

  public function error($errors = [], $message = '', $code = 400): JsonResponse
  {
    return response()->json([
      'success' => false,
      'code' => $code,
      'message' => $message,
      'errors' => $errors,
    ], $code);
  }
}
