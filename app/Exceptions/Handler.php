<?php
namespace App\Exceptions;

use App\Support\Helpers\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {

            // 1️⃣ Validation errors
            if ($exception instanceof ValidationException) {
                return ApiResponse::validation($exception->errors());
            }

            // 2️⃣ Model not found
            if ($exception instanceof ModelNotFoundException) {
                return ApiResponse::error('Resource not found', 404);
            }

            // 3️⃣ Database / MySQL errors (YOUR CODE GOES HERE 👇)
            if ($exception instanceof QueryException) {

                $code = $exception->errorInfo[1] ?? null;

                // Duplicate entry
                if ($code === 1062) {
                    return ApiResponse::error('Duplicate entry error', 400);
                }

                return ApiResponse::error(
                    config('app.debug')
                        ? 'Database error: ' . $exception->getMessage()
                        : 'Database error',
                    500
                );
            }

            // 4️⃣ Any other unhandled exception
            return ApiResponse::error(
                config('app.debug')
                    ? $exception->getMessage()
                    : 'Internal server error',
                500
            );
        }

        // Blade / Web fallback
        return parent::render($request, $exception);
    }
}
