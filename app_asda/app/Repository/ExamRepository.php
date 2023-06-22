<?php

namespace App\Repository;

use Exception;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;

class ExamRepository implements ExamRepositoryInterface
{
    

    public function index()
    {
        $teacherId = auth()->user()->id;
        
        $exams = Exam::whereHas('subject', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->get();
        
        return view('pages.Exams.index', compact('exams'));
    }
    

    public function create()
{
    $user = auth()->user();
    $grades = Grade::whereHas('subjects', function ($query) use ($user) {
        $query->whereHas('teacher', function ($subQuery) use ($user) {
            $subQuery->where('teacher_id', $user->id);
        });
    })->get();

    $data['subjects'] = Subject::whereHas('teacher', function ($query) use ($user) {
        $query->where('teacher_id', $user->id);
    })->get();

    return view('pages.Exams.create', compact('grades'), $data);
}


    public function store($request)
    {
        try {
            $exams = new Exam();
            $exams->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exams->subject_id = $request->subject_id;
            //$exams->grade_id = $request->Grade_id;
           // $exams->classroom_id = $request->Classroom_id;
            
            //$exams->teacher_id = auth()->user()->id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        return view('pages.Exams.edit', compact('exam'));
    }

    public function update($request)
    {
        try {
            $exam = Exam::findorFail($request->id);
            $exam->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Exams.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Exam::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
