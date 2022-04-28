<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class APIResponse
{
    /**
     * Вывод ошибки
     *
     * @param string $message
     * @param int $status
     * @param mixed|null $appends
     * @return JsonResponse
     */
    public static function error(string $message, int $status, mixed $appends = null): JsonResponse
    {
        $json = [
            'success' => false,
            'message' => $message,
        ];

        if ($appends) {
            $json['data'] = $appends;
        }

        return response()->json($json, $status);
    }

    /**
     * Вывод успешного ответа
     *
     * @param string $message
     * @param int $status
     * @param mixed $appends
     * @return JsonResponse
     */
    public static function success(string $message, mixed $appends = null, int $status = 200): JsonResponse
    {
        $json = [
            'success' => true,
            'message' => $message,
        ];

        if ($appends) {
            $json['data'] = $appends;
        }

        return response()->json($json, $status);
    }
}
