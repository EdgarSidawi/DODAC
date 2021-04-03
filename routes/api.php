<?php

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/patient', PatientController::class);
Route::apiResource('/region', RegionController::class);
Route::apiResource('/region/{region}/district', DistrictController::class);
Route::apiResource('/district/{district}/disease', DiseaseController::class);

Route::get('/login', [UserController::class, 'login']);
