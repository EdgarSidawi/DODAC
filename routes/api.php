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
