<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

require __DIR__.'/auth.php';
