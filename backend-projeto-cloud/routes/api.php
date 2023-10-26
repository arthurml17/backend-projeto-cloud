<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\ProjectController;

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

/******************** Routes for projects ********************/

Route::get('/project', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show']);

Route::get('/projects/active', [ProjectController::class, 'getActive']);
Route::get('/projects/inactive', [ProjectController::class, 'getInactive']);

Route::post('/project', [ProjectController::class, 'store']);

Route::put('/project/{id}', [ProjectController::class, 'update']);

Route::delete('/project/{id}', [ProjectController::class, 'destroy']);

/******************** End routes for projects ********************/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
