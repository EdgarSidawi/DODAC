<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/district', [DistrictController::class, 'districts']);
