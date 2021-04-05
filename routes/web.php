<?php

use App\Http\Controllers\CommentController;
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
})->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('volunteers', App\Http\Controllers\VolunteerController::class);
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('subscribers', App\Http\Controllers\SuscriberController::class);
Route::resource('/posts/{post}/comments', CommentController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('donations', App\Http\Controllers\DonationController::class);

Route::get('categories/{category}/posts', [App\Http\Controllers\PostController::class, 'index'])->name('categories.posts.index');

Route::get('/back', function () {
    return view('layouts.masterBack');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::resource('posts', App\Http\Controllers\Admin\PostController::class, [
        'except' => ['create', 'store']
    ]);

    Route::get('subscribers/filter', [\App\Http\Controllers\Admin\SubscriberController::class, 'filter'])->name('subscribers.filter');

    Route::delete('subscribers/destroyall', [\App\Http\Controllers\Admin\SubscriberController::class, 'destroyAll'])->name('subscribers.destroyAll');

    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class, [
        'except' => ['create', 'store']
    ]);


    Route::get('volunteers/filter', [App\Http\Controllers\Admin\VolunteerController::class, 'filter'])->name('volunteers.filter');
    Route::resource('volunteers', App\Http\Controllers\Admin\VolunteerController::class, [
        'except' => ['create', 'store']
    ]);

    Route::resource('comments', App\Http\Controllers\Admin\CommentController::class, [
        'except' => ['create', 'store']
    ]);

    Route::resource('donations', App\Http\Controllers\Admin\DonationController::class, [
        'except' => ['create', 'store', 'destroy']
    ]);

    Route::get('volunteers/approved/{volunteer}', [App\Http\Controllers\Admin\VolunteerApprovalController::class, 'update'])->name('volunteers.approved');
    Route::get('volunteers/rejected/{volunteer}', [App\Http\Controllers\Admin\VolunteerApprovalController::class, 'reject'])->name('volunteers.rejected');

});

Route::get('/approved/{post}', [App\Http\Controllers\PostApprovalController::class, 'publish'])->name('posts.publish');

