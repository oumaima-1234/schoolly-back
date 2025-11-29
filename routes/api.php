<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EtudiantController;
Route::apiResource('etudiants', EtudiantController::class);

use App\Http\Controllers\Api\ProfesseurController;
Route::apiResource('professeurs', ProfesseurController::class);

use App\Http\Controllers\Api\CoursController;
Route::apiResource('cours', CoursController::class);

use App\Http\Controllers\Api\ContactController;
Route::apiResource('contacts', ContactController::class);



use App\Http\Controllers\Api\DirecteurController;
Route::apiResource('directeurs', DirecteurController::class);

use App\Http\Controllers\Api\AuthController;
// Public routes
Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes (require token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
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

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    //return $request->user();
});
