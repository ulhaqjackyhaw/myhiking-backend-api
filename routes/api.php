<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FieldCentreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return response()->json([
        'status' => false,
        'message' => 'Unauthorized access'
    ], 401);
})->name('login');

Route::get('field_centres', [FieldCentreController::class, 'index'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
