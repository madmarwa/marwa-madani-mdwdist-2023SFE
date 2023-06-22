<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ExamAdminController extends Controller
{
    // Get Classrooms
    public function index()
    {
        $exams = Exam::all();
        return view('pages.Admin.Exams.index', compact('exams'));
    }
}