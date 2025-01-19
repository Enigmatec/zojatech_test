<?php

use App\Http\Controllers\Admin\OrganizationStructureController;
use App\Http\Controllers\Admin\StructureItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Onboarding\OrganizationController;
use App\Http\Controllers\Onboarding\RegisterController;
use App\Http\Middleware\OrganizationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('onboarding/register', RegisterController::class);

Route::post('auth/login', LoginController::class);

Route::middleware(['auth:sanctum', 'organization'])->group(function(){
    Route::post('onboarding/organization', OrganizationController::class);
    Route::prefix('admin')->group(function(){
        Route::apiResource('users', UserController::class);
        Route::apiResource('structures', OrganizationStructureController::class);
        Route::apiResource('structures.items', StructureItemController::class);
    });
});