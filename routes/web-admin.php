<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\UserManagementController;




    Route::prefix("/register")->group(function(){
        Route::get('/',[RegisterController::class, 'showRegistrationForm'])->name('showregister');
        Route::post('/',[RegisterController::class, 'register'])->name('register');    
    });
   
    Route::prefix("/login")->group(function(){
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('showlogin');
        Route::post('/',[LoginController::class, 'login'])->name('login');
    });

   Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home', [AdminController::class, 'index'])->name('home');
        Route::prefix("/tasks")->group(function(){
            Route::get('/', [TaskController::class, 'showAll'])->name('tasks');
            Route::get('/{user}', [UserManagementController::class, 'showTasks'] )->name('showtasks');
        });

        Route::prefix("/add")->group(function(){
            Route::get('/user', [UserManagementController::class, 'showAdduser'])->name('add');
            Route::post('/', [UserManagementController::class, 'insert'])->name('insert');
        });

        Route::get('/users', [UserManagementController::class, 'showAll'])->name('users');
        Route::get('/{user}', [UserManagementController::class, 'showUser'] )->name('showuser');
        Route::put('/{user}', [UserManagementController::class, 'update'] )->name('edituser');
        Route::delete('/{user}', [UserManagementController::class, 'delete'] )->name('delete');
   });


