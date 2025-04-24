<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\JoudController;



Route::get('/joud',[JoudController::class,'index']);
Route::get('/',[BookController::class,'index']);
