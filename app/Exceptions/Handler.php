<?php

namespace App\Exceptions;

use App\Http\Response\APIResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return APIResponse::error('Page not found.', 404);
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|Response|HttpResponse
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response|JsonResponse|HttpResponse
    {
        if ($request->ajax() || $request->wantsJson()) {
            return APIResponse::error($e->getMessage(), $e->getCode());
        }

        return parent::render($request, $e);
    }
}
