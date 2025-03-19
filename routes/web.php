<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Homepage route
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Post routes
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');