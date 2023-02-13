<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;




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
   });


