<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

route::middleware([CheckIsNotLogged::class])->group(function(){
Route::get( 'login', [AuthController::class, 'login']);
Route::post('loginSubmit', [AuthController::class, 'loginSubmit']);
});


Route::middleware([CheckIsLogged::class])->group(function(){
Route::get( 'logout', [AuthController::class, 'logout']);
Route::get('/', [MainController::class, 'index']);
Route::get('/newNote', [MainController::class, 'newNote']);
});