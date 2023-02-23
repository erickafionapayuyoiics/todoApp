<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
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

Auth::routes();

Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit', [HomeController::class, 'showProfile'])->name('editprofile');
    Route::put('/update', [HomeController::class, 'update'])->name('update');

    Route::prefix('/post')->as('post.')->group(function () {
        Route::get('/', [PostController::class, 'showAll'])->name('showall');
        Route::get('/add', [PostController::class, 'addPost'])->name('add');
        Route::get('/{post}', [PostController::class, 'showPost'])->name('show');
        Route::get('/update/{post}', [PostController::class, 'updatePost'])->name('update');
    });

    Route::prefix('/task')->as('data.')->group(function () {
        Route::get('/{task}', [TaskController::class, 'show'])->name('show');
        Route::post('/{user}', [TaskController::class, 'insert'])->name('insert');
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');
        Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');
    });
});
