<?php

use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/showposts', [PostApiController::class, 'showAll']);
Route::get('/showpost/{post}', [PostApiController::class, 'findPost']);
Route::put('/update/{post}', [PostApiController::class, 'update']);
Route::post('/add', [PostApiController::class, 'add']);
Route::delete('/delete/{post}', [PostApiController::class, 'delete']);
