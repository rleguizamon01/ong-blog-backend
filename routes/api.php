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

Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {

    Route::delete('posts/{post}', [\App\Http\Controllers\API\PostController::class, 'destroy']);
    Route::delete('posts/destroy/{post}', [\App\Http\Controllers\API\PostController::class, 'destroyforever']);
    Route::post('logout', [\App\Http\Controllers\API\UserController::class,'logout']);
});
// Route::apiResource('posts', App\Http\Controllers\API\PostController::class);
Route::get('posts', [\App\Http\Controllers\API\PostController::class, 'index']);
Route::get('posts/{post}', [\App\Http\Controllers\API\PostController::class, 'show']);
Route::post('posts', [\App\Http\Controllers\API\PostController::class, 'store']);

Route::delete('users/{user}', [\App\Http\Controllers\API\UserController::class,'destroy']);
Route::apiResource('categories', App\Http\Controllers\API\CategoryController::class);
Route::get('users', [\App\Http\Controllers\API\UserController::class,'index']);
Route::apiResource('volunteers', App\Http\Controllers\API\VolunteerController::class);
Route::post('register', [\App\Http\Controllers\API\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\API\UserController::class, 'login']);
