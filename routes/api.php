<?php

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/samples', SampleController::class);
});
