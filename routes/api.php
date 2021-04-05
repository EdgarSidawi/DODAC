<?php

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/patient', PatientController::class);
// Route::apiResource('/region', RegionController::class);
// Route::apiResource('/region/{region}/district', DistrictController::class);
// Route::apiResource('/district/{district}/disease', DiseaseController::class);

Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);

Route::middleware('auth:sanctum')->delete('/logout', [UserController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/patient', PatientController::class);
    Route::apiResource('/region', RegionController::class);
    Route::apiResource('/region/{region}/district', DistrictController::class);
    Route::apiResource('/district/{district}/disease', DiseaseController::class);
});
