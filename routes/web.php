<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/login', [UsersController::class, 'getStatus']);

Route::get('/get/employees', [EmployeesController::class, 'index']);

Route::any('{any}', function () {
    return view('welcome');
})->where('any', '.*');
