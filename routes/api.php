<?php
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->group(function () {
    Route::get('/medicines', [MedicineController::class, 'index']);
    Route::post('/medicines', [MedicineController::class, 'store']);
    Route::get('/medicines/{id}', [MedicineController::class, 'show']);
    Route::put('/medicines/{id}', [MedicineController::class, 'update']);
    Route::delete('/medicines/{id}', [MedicineController::class, 'destroy']);
// });
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
//////////////////////////////

Route::get('/profile', [ProfileController::class, 'index']);
Route::PUT('/profile/{id}', [ProfileController::class, 'update']);
Route::get('/profile/{id}', [ProfileController::class, 'show']);
