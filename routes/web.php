<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('volunteers', App\Http\Controllers\VolunteerController::class);
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('subscribers', App\Http\Controllers\SuscriberController::class);
Route::resource('/posts/{post}/comments', CommentController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::get('/back', function () {
    return view('layouts.masterBack');
});
