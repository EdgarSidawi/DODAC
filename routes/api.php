<?php

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;


// Route::apiResource('/patient', PatientController::class);
// Route::apiResource('/region', RegionController::class);
// Route::apiResource('/region/{region}/district', DistrictController::class);
// Route::apiResource('/district/{district}/disease', DiseaseController::class);


Route::apiResource('/patient', PatientController::class);
Route::apiResource('/region', RegionController::class);
Route::apiResource('/region/{region}/district', DistrictController::class);
Route::apiResource('/district/{district}/disease', DiseaseController::class);
