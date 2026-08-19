<?php

use Illuminate\Support\Facades\Route;
use App\Models\Attendance;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () { 
    return view('welcome', [
        'attendances' => Attendance::all(),
    ]); 
});

Route::post('/attendance', [AttendanceController::class, 'store'])
    ->name('attendance.store');