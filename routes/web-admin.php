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
    
    Route::get('/tasks', [TaskController::class, 'showAll'])->name('tasks');
    Route::get('/users', [UserManagementController::class, 'showAll'])->name('users');
    Route::get('/add/user', [UserManagementController::class, 'showAdduser'])->name('add');
    Route::post('/add/user', [UserManagementController::class, 'insert'])->name('adduser');
    Route::get('/show/{user}', [UserManagementController::class, 'showUser'] )->name('showuser');
    Route::get('/tasks/{user}', [UserManagementController::class, 'showTasks'] )->name('showtasks');
    Route::put('/update/{user}', [UserManagementController::class, 'update'] )->name('edituser');
    Route::delete('/delete/{user}', [UserManagementController::class, 'delete'] )->name('delete');

   Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home', [AdminController::class, 'index'])->name('home');
   });


