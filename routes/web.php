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
    return view('website.welcome');
})->name('welcome');


Auth::routes();

Route::get('/home', function () {
    return view('website.welcome');
})->name('home');

Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::get('categories/{category}/posts', [App\Http\Controllers\PostController::class, 'index'])->name('categories.posts.index');
Route::resource('donations', App\Http\Controllers\DonationController::class);
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('posts/{post}/comments', CommentController::class);
Route::post('posts/storeimage', [App\Http\Controllers\PostController::class, 'storeImage'])->name('store.image');
Route::resource('subscribers', App\Http\Controllers\SuscriberController::class);
Route::resource('volunteers', App\Http\Controllers\VolunteerController::class);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class, [
        'except' => ['create', 'store']
    ]);

    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class, [
        'except' => ['create', 'store']
    ]);

    Route::delete('subscribers/{subscriber?}', [\App\Http\Controllers\Admin\SubscriberController::class, 'destroy'])->name('subscribers.destroy');



    Route::resource('volunteers', App\Http\Controllers\Admin\VolunteerController::class, [
        'except' => ['create', 'store']
    ]);

    Route::resource('comments', App\Http\Controllers\Admin\CommentController::class, [
        'except' => ['create', 'store']
    ]);

    Route::resource('donations', App\Http\Controllers\Admin\DonationController::class, [
        'except' => ['create', 'store', 'destroy']
    ]);

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    Route::get('posts/{post}/approved', [App\Http\Controllers\Admin\PostApprovalController::class, 'publish'])->name('posts.publish');

    Route::patch('volunteers/{volunteer}/approve', [App\Http\Controllers\Admin\VolunteerApprovalController::class, 'approve'])->name('volunteers.approve');
    Route::patch('volunteers/{volunteer}/reject', [App\Http\Controllers\Admin\VolunteerApprovalController::class, 'reject'])->name('volunteers.reject');
});
