<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PublicPostController;

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Post blog
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

//Profile
Route::get('/profile/{user}', [UserController::class, 'profile_user'])->name('profile')->middleware('auth');
Route::get('/manage-photo', [UserController::class, 'manage'])->name('photo')->middleware('auth');
Route::post('/manage-photo', [UserController::class, 'store_photo'])->name('store.photo')->middleware('auth');

//Welcome post
Route::get('/posts', [PublicPostController::class, 'index'])->name('welcome.posts')->middleware('guest');

//Dashboard post
Route::get('/dashboard-posts', [DashboardController::class, 'index'])->name('dashboard.posts')->middleware('auth');

//Comments & likes

Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::delete('/unlike', [LikeController::class, 'unlike'])->name('unlike');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

//Chat
Route::middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});

require __DIR__ . '/auth.php';
