<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UsersController;

Route::post('/login', [UsersController::class, 'login']);
Route::get('/status', [UsersController::class, 'status']);
Route::get('/get/employees', [EmployeesController::class, 'index']);
Route::get('/message/{id}', [RequestController::class, 'show']);

Route::any('{any}', function () {
    return view('welcome');
})->where('any', '.*');
