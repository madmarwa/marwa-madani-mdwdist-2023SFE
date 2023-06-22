<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

use App\Http\Controllers\Marks\MarkController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Exams\ExamController;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth:teacher,web'], function () {
    Route::get('/Get_classrooms/{gradeId}', [AjaxController::class,'getClassrooms']);
Route::get('/subject/{id}', [SubjectController::class, 'getsubjects']);
Route::get('/Get_Sections/{id}', [AjaxController::class,'Get_Sections']);
Route::get('/Get_students/{id}', [StudentController::class, 'getstudents']);
Route::get('/marksedite/{id}/{classroom}/{subject}/{exam}', [MarkController::class, 'markget']);
Route::get('/students/{id}/{classroom}', [StudentController::class, 'getmarkstudents']);
Route::resource('subjects', SubjectController::class);
Route::resource('Marks', MarkController::class);
Route::resource('Exams', ExamController::class);


});
