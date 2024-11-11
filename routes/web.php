<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::get( 'login', [AuthController::class, 'login']);
Route::post('loginSubmit', [AuthController::class, 'loginSubmit']);


Route::get( 'logout', [AuthController::class, 'logout']);
Route::get('/', [MainController::class, 'index']);
Route::get('/newNote', [MainController::class, 'newNote']);
