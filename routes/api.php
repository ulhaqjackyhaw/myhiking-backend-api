<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GunungController;
use App\Http\Controllers\Api\JalurController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('gunung', [GunungController::class, 'index']);
Route::get('/gunung/{id_gunung}', [JalurController::class, 'index']);
Route::get('/gunung/{id_gunung}/jalur/{id_jalur}', [JalurController::class, 'jalur']);
// Route::get('/gunung/beranda', [GunungController::class, 'getGunungForBeranda']);

