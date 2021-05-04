<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('posts/destroy/{id}', [\App\Http\Controllers\API\PostController::class, 'destroyforever']);
Route::apiResource('posts', App\Http\Controllers\API\PostController::class);

Route::apiResource('categories', App\Http\Controllers\API\CategoryController::class);
Route::get('users', [\App\Http\Controllers\API\UserController::class,'index']);
Route::delete('users/{user}', [\App\Http\Controllers\API\UserController::class,'destroy']);
Route::apiResource('volunteers', App\Http\Controllers\API\VolunteerController::class);
