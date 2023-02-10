<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;



Route::prefix("admin")->group(function(){
    Route::get('/register',[RegisterController::class, 'showRegistrationForm']);
    //Route::get('/register', [RegisterController::class, 'register'])->name('admin.register');
    Route::post('/register',[RegisterController::class, 'register'])->name('admin.register');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.showlogin');
    Route::post('/login',[LoginController::class, 'login'])->name('admin.login');
    Route::post('/redirect', [LoginController::class, 'redirectLogin'])->name('admin.redirect');


   Route::middleware(['auth:admin'])->group(function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
   });


});

Auth::routes();