<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/insert/{user}', [TaskController::class, 'insert'] )->name('data.insert');

Route::get('/show/{task}', [TaskController::class, 'show'] )->name('data.show');

Route::put('/update/{task}', [TaskController::class, 'update'] )->name('data.update');

Route::delete('/delete/{task}', [TaskController::class, 'delete'] )->name('data.delete');

Auth::routes();

