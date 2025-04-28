<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\TimeslotController;

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

Route::get('/', function () {
    return view('admin');
});

Route::resource('teachers', TeacherController::class);
Route::resource('classes', ClassRoomController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('assignments', AssignmentController::class);
Route::resource('timeslots', TimeslotController::class);

Route::get('/generate-timetable', [TimetableController::class, 'generate'])->name('generate.timetable');

