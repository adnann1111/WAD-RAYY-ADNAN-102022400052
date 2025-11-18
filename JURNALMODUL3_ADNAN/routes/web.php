<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\profileController;


Route::get('/', [DashboardController::class, 'index']);
Route::get('/profil', [profileController::class, 'index']);
