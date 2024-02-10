<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/buildings', [BuildingController::class, 'index']);
// Route::get('/buildings/all', [BuildingController::class, 'indexAll']);
Route::get('/buildings/{building:slug}', [BuildingController::class, 'show']);
Route::post('/messages', [MessageController::class, 'store']);

