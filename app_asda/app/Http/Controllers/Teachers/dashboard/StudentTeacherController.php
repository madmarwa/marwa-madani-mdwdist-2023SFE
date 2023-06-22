<?php

namespace App\Http\Controllers\Teachers\dashboard;

use Exception;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentTeacherController extends Controller
{

    public function index()
{
    

    // Récupérer les IDs des sujets liés à l'utilisateur connecté
    $ids = DB::table('subjects')->where('teacher_id', auth()->user()->id)->pluck('classroom_id');
      
    // Récupérer les étudiants associés aux IDs de sujets
    $students = Student::whereIn('Classroom_id', $ids)->with('myparent')->get();
  
    return view('pages.Teachers.dashboard.students.index', compact('students'));
}



    public function classrooms()
    {
        $ids = DB::table('subjects')->where('teacher_id', auth()->user()->id)->pluck('classroom_id');
        $classrooms = Classroom::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.classrooms.index', compact('classrooms'));
    }

 
   
   

}