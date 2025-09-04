<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->apiResource("tasks", \App\Http\Controllers\Api\TasksController::class);
Route::post("api_login", [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');
Route::post("api_register", [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.register');
