<?php

use App\Http\Livewire\VenteProduits;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


use App\Http\Controllers\Don\DonController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Marks\MarkController;
use App\Http\Controllers\event\eventController;

use App\Http\Controllers\stock\stockController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Donateur\DonateurController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Classrooms\ClassroomController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::group(
  
    [
        
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('Grades', GradeController::class);
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::view('add_parent', 'livewire.show_Form')->name('add_parent');
        Route::resource('Teachers', TeacherController::class);
        Route::get('admin', [AdminController::class,'index'])->name('admin.show');
        Route::post('admin/{id}', [AdminController::class,'update'])->name('admin.update');
        Route::resource('Students', StudentController::class);
        Route::get('/Get_classrooms_all/{id}', [StudentController::class, 'Get_classrooms_all']);
        Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('subjects', SubjectController::class);
        Route::get('/Get_students/{id}', [StudentController::class, 'getstudents']);
        Route::get('/subject/{id}', [SubjectController::class, 'getsubjects']);
       
        Route::get('/studentsedite', [StudentController::class, 'studentsedite']);
       
       
        Route::resource('Members', MemberController::class);
        Route::resource('Donateurs', DonateurController::class);
        Route::resource('Dons', DonController::class);
        Route::get('/donnateur/{id}', [DonateurController::class, 'getdonateur']);
        Route::resource('products', ProductController::class);
        Route::resource('events', eventController::class);

    }

);
