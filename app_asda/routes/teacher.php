<?php

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Marks\MarkController;

use App\Http\Controllers\Students\StudentController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\StudentTeacherController;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {
        Route::resource('Marks', MarkController::class);
       // Route::resource('Exams', ExamController::class);
        Route::get('/marksedite/{id}/{classroom}/{subject}/{exam}', [MarkController::class, 'markget']);
        Route::get('/students/{id}/{classroom}', [StudentController::class, 'getmarkstudents']);
        Route::get('/studentsedite', [MarkController::class, 'Markedite'])->name('Marks.modifier');
      
    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $teacherId = auth()->user()->id;

        $classroomIds = DB::table('Classrooms')
            ->join('subjects', 'Classrooms.id', '=', 'subjects.classroom_id')
            ->where('subjects.teacher_id', $teacherId)
            ->pluck('Classrooms.id');
        
        $data['count_classrooms'] = $classroomIds->count();
        
        $count_students = DB::table('students')
            ->whereIn('classroom_id', $classroomIds)
            ->count();
        
        $data['count_students'] = $count_students;
        
        return view('pages.Teachers.dashboard.dashboard', $data);
    });

    Route::group(['namespace' => 'Teachers\dashboard'], function () {
        //==============================students============================
        Route::get('studente',[StudentTeacherController::class,'index'])->name('studente.index');
        Route::get('classrooms',[StudentTeacherController::class,'classrooms'])->name('classrooms');
      
        
       
       Route::get('profile', [ProfileController::class,'index'])->name('profile.show');
       Route::post('profile/{id}', [ProfileController::class,'update'])->name('profile.update');
    

    });

});
