<?php

use App\Http\Controllers\JoudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/joud',[JoudController::class,'index']);
