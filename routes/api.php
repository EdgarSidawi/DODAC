<?php

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/patient', PatientController::class);
Route::apiResource('/region', RegionController::class);
Route::apiResource('/region/{region}/district', DistrictController::class);
Route::apiResource('/district/{district}/disease', DiseaseController::class);

Route::delete('/logout', [UserController::class, 'logout']);
Route::get('/user', [UserController::class, 'user']);

Route::post('/searchPatient', [PatientController::class, 'search']);
Route::post('/searchUser', [UserController::class, 'search']);
Route::put('/user/{user}', [UserController::class, 'update']);
Route::delete('/user/{user}', [UserController::class, 'destroy']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/district', [DistrictController::class, 'districts']);

Route::get('/disease', [DiseaseController::class, 'monitor']);
