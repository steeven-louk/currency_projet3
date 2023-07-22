<?php

use App\Http\Controllers\ConversionController;
use App\Http\Controllers\DeviseController;
use App\Http\Controllers\PaireController;
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

Route::apiResource('/device', DeviseController::class);
Route::apiResource('/paire', PaireController::class);
Route::get('paire/{devise_1}/{devise_2}/{amount}', [PaireController::class, 'getConversions']);

// Route::apiResource('/paire/{devise_1}/{devise_2}/{amount}', ConversionController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
