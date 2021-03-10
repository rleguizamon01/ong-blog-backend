<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'index'])->name('comment.index');
Route::get('/posts/{post}/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'show'])->name('comment.show');
