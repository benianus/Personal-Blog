<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/posts', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/posts', [PostController::class, 'showPosts'])->name('dashboard-posts');
Route::get('/dashboard/categories', [PostController::class, 'showCategories'])->name('dashboard-categories');
Route::get('/dashboard/tags', [PostController::class, 'showTags'])->name('dashboard-tags');
Route::get('/category', [PostController::class, 'getPostsByCategory']);

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
