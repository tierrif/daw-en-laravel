<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/attendance/add/{uc_id}/{class_id}', [AttendanceController::class, 'create']);

Route::post('/attendance/store', [AttendanceController::class, 'store']);

Route::get('/attendance/show/{uc_id}/{class_id}', [AttendanceController::class, 'index']);
