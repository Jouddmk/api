<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('category', [CategoryController::class, 'index']);
// Route::post('category', [CategoryController::class, 'store']);
// Route::put('category/{id}', [CategoryController::class, 'update']);
// Route::get('category/{id}', [CategoryController::class, 'show']);
// Route::delete('category/{id}', [CategoryController::class, 'destroy']); // تم تصحيحها
// Route::apiResource('joud', CategoryController::class);

use App\Http\Controllers\BookController; // Ensure this matches the actual namespace of BookController
Route::get('books', [CategoryController::class, 'index']);
Route::apiResource('books',BookController::class); // Ensure BookController exists in the specified namespace
