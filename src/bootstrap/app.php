<?php

use App\Application\Exceptions\Authors\AuthorCreateException;
use App\Application\Exceptions\Authors\AuthorNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
        $exceptions->render(function (ValidationException $exception, Request $request) {
            $errors = [];
            foreach ($exception->errors() as $field => $error) {
                $field = preg_replace('/\.\d+$/', '', $field); // 配列の場合ひとまとめにする
                $errors[] = [
                    'field' => $field,
                    'detail' => $error[0],
                ];
            }

            return response()->json([
                'message' => '入力項目に誤りがあります。',
                'errors' => $errors,
            ], $exception->status);
        });

        $exceptions->render(function (AuthorCreateException $e, Request $request) {
            return response()->json(['message' => $e->getMessage()], 500);
        });

        $exceptions->render(function (AuthorNotFoundException $e, Request $request) {
            return response()->json(['message' => $e->getMessage()], 404);
        });
    })->create();
