<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Handler extends ExceptionHandler
{
    /**
     * @var array
     */
    protected $levels = [];

    /**
     * @var array
     */
    protected $dontReport = [];

    /**
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|Response|HttpResponse
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response|JsonResponse|HttpResponse
    {
        if ($request->ajax() || $request->wantsJson()) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $code = $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];

            return response()->json($json, $code);
        }

        return parent::render($request, $e);
    }
}
