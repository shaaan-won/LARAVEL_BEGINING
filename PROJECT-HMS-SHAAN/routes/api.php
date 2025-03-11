<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::get('/users1', [UserController::class, 'index1']);


//API Routes 
Route::resource('/users', UserController::class);
Route::resource('/appointments', AppointmentController::class);