<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Posts
    Route::get('get-posts', [PostController::class, 'getPosts']);
    Route::resource('posts', PostController::class);
    // Roles
    Route::get('get-roles', [RoleController::class, 'getRoles']);
    Route::resource('roles', RoleController::class);
    // Users
    Route::get('get-users', [UserController::class, 'getUsers']);
    Route::resource('users', UserController::class);
});
