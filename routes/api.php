<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TempImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [LoginController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);




Route::get('blogs', [BlogController::class, 'index']);
Route::post('blogs', [BlogController::class, 'store']);
Route::post('save-temp-image', [TempImageController::class, 'store']);
Route::get('blogs/{id}', [BlogController::class, 'show']);
Route::put('blogs/{id}', [BlogController::class, 'update']);
Route::delete('blogs/{id}', [BlogController::class, 'destroy']);

// Routes for handling comments
Route::post('/blogs/{blog}/comments', [CommentController::class, 'store']);
Route::put('/blogs/{blog}/comments/{comment}', [CommentController::class, 'update']);
Route::delete('/blogs/{blog}/comments/{comment}', [CommentController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
