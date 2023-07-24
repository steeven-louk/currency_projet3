<?php


use App\Http\Controllers\API\ConversionController;
use App\Http\Controllers\API\DeviseController;
use App\Http\Controllers\API\PaireController;
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

// Route::apiResource('/devise', DeviseController::class);
// Route::apiResource('/paire', PaireController::class);
// Route::get('paire/requestCount/{devise_1}/{devise_2}', [ConversionController::class, 'getConversionCount']);
// Route::get('paire/{devise_1}/{devise_2}/{amount}', [ConversionController::class, 'index']);
Route::apiResource('/devise', DeviseController::class);
Route::apiResource('/paire', PaireController::class);
Route::get('paire/requestCount/{devise_1}/{devise_2}', [ConversionController::class, 'getConversionCount']);
Route::get('paire/{devise_1}/{devise_2}/{amount}', [ConversionController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
