<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use PHPUnit\Event\NoPreviousThrowableException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception){
        parent::report($exception);
    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException)
            return response()->view('errors.404', compact('exception'), 404);


        if ($exception instanceof ModelNotFoundException) {
            return response()->view('errors.404', compact('exception'), 404);
        }

        return parent::render($request,$exception);
    }


    public function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json(["message"=>"Unauthenticated"],401)
            : redirect()->guest(route("istifadeci.daxilol"));

    }
}

