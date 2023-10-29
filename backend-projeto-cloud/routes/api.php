<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\GenericUser;
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

// Route::get('/project/{id}/edit', [ProjectController::class, 'edit']);

Route::get('/projects/active', [ProjectController::class, 'getActive']);
Route::get('/projects/inactive', [ProjectController::class, 'getInactive']);

Route::post('/project', [ProjectController::class, 'store']);

Route::put('/project/{id}', [ProjectController::class, 'update']);

Route::delete('/project/{id}', [ProjectController::class, 'destroy']);

/******************** End routes for projects ********************/

/******************** Routes for users ********************/

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::post('/user', [UserController::class, 'store']);

Route::put('/user/{id}', [UserController::class, 'update']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);

/******************** End routes for users ********************/

/******************** Routes for login ********************/

Route::post('/login', [LoginController::class, 'auth']);

/******************** End routes for login ********************/




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
