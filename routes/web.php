<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\LockerUsageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locations/search', [LocationController::class, 'search']);
Route::get('/locations/{location}', [LocationController::class, 'show']);
Route::get('/locations/{location}/lockers', [LocationController::class, 'lockers']);
Route::get('/locker-usages/{locker_usage}', [LockerUsageController::class, 'show']);
Route::patch('/locker-usages/{locker_usage}/release', [LockerUsageController::class, 'release']);
Route::get('/lockers/{locker}/confirm', [LockerController::class, 'confirm']);
Route::post('/lockers/{locker}/confirm', [LockerController::class, 'store']);