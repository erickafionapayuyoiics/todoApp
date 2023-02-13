<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;



Route::prefix("admin")->group(function(){
    Route::prefix("register")->group(function(){
        Route::get('/',[RegisterController::class, 'showRegistrationForm']);
        Route::post('/',[RegisterController::class, 'register'])->name('admin.register');    
    });
   
    Route::prefix("login")->group(function(){
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.showlogin');
        Route::post('/',[LoginController::class, 'login'])->name('admin.login');
    });
    
   Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
   });


});

Auth::routes();