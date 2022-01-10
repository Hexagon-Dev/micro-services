<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (UnprocessableEntityHttpException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        });
        $this->renderable(function (ItemNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        });
        $this->renderable(function (UnauthorizedException $e) {
            return response()->json([
                'error' => 'unauthorized',
            ], Response::HTTP_UNAUTHORIZED);
        });
    }
}
