<?php

// Corrected: Removed 'Auth' subdirectory from the namespace
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes (no auth required)
Route::post('/auths/login', [AuthController::class, 'login']);
Route::post('/auths/register', [AuthController::class, 'store']);
Route::post('/auths/forget_password', [AuthController::class, 'forgetPassword']);
// Protected routes (auth required via Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Get currently authenticated user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::apiResource('auths', AuthController::class);
});
