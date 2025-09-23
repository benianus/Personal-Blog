<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/posts', [PostController::class, 'create'])
    ->can('create', [Post::class]);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->can('update', 'post');
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->can('delete', 'post');
Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard')
    ->can('dashboard', [Post::class]);
Route::get('/dashboard/posts', [PostController::class, 'showPosts'])->name('dashboard-posts')
    ->can('dashboard', [Post::class]);
Route::get('/dashboard/categories', [PostController::class, 'showCategories'])->name('dashboard-categories')
    ->can('dashboard', [Post::class]);
Route::get('/dashboard/tags', [PostController::class, 'showTags'])->name('dashboard-tags')
    ->can('dashboard', [Post::class]);
Route::get('/category', [PostController::class, 'getPostsByCategory']);

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
