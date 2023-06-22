<?php

namespace App\Repository;

use Exception;
use App\Models\Exam;
use App\Models\Mark;

use App\Models\Grade;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MarkRepository implements MarkRepositoryInterface
{

    public function index()
    {
        $marks = Mark::get();
        return view('pages.marks.index', compact('marks'));
    }

    public function create()
    {
        $teacherId = auth()->user()->id;
       
        $user = auth()->user();
        $my_classes = Grade::whereHas('subjects', function ($query) use ($user) {
        $query->whereHas('teacher', function ($subQuery) use ($user) {
            $subQuery->where('teacher_id', $user->id);
        });
    })->get();

    $data['subjects'] = Subject::whereHas('teacher', function ($query) use ($user) {
        $query->where('teacher_id', $user->id);
    })->get();
    $data['exams'] = Exam::whereHas('subject', function ($query) use ($teacherId) {
        $query->where('teacher_id', $teacherId);
    })->get();
    

        //$data['my_classes'] = Grade::all();
        //$data['subjects'] = Subject::all();
       // $data['exams'] = Exam::all();

        return view('pages.marks.create', $data, compact('my_classes'));
    }

    public function store($request)
    {
        $studentIds = $request->input('student_id');

        if (!empty($studentIds)) {
            $studentCount = count($studentIds);

            for ($i = 0; $i < $studentCount; $i++) {
                $data = new Mark();
                $data->marks = $request->input('marks')[$i];
                $data->exam_id = $request->input('exam_id');
                $data->student_id = $studentIds[$i];
              
               
                $data->save();
            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Marks.index');
        }
    }


    public function edit($id)
    {
        
    }

    public function update($request)

    {
        $allData = Mark::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('subject_id', $request->subject_id)
        ->where('exam_id', $request->exam_id)
        ->delete();
        $studentIds = $request->input('student_id');

        if (!empty($studentIds)) {
            $studentCount = count($studentIds);

            for ($i = 0; $i < $studentCount; $i++) {
                $data = new Mark();
                $data->marks = $request->input('marks')[$i];
                $data->exam_id = $request->input('exam_id');
                $data->student_id = $studentIds[$i];
                $data->subject_id = $request->input('subject_id');
                $data->grade_id = $request->input('Grade_id');
                $data->classroom_id = $request->input('Classroom_id');
                $data->save();
            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Marks.index');
        }
    }

    public function destroy($request)
    {
        try {
            Mark::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Markedite()
    {
        $user = auth()->user();
        $my_classes = Grade::whereHas('subjects', function ($query) use ($user) {
            $query->whereHas('teacher', function ($subQuery) use ($user) {
                $subQuery->where('teacher_id', $user->id);
            });
        })->get();
    
        $data['subjects'] = Subject::whereHas('teacher', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->get();
        $data['exams'] = Exam::whereHas('teacher', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->get();

        
        return view('pages.Marks.edit',$data , compact('my_classes'));
    }
    
    public function markget($gradeId, $classroomId, $subjectid, $examid){
        $allData = Mark::where('Grade_id', $gradeId)
        ->where('Classroom_id', $classroomId)
        ->where('subject_id', $subjectid)
        ->where('exam_id', $examid)
        ->with('student')
        ->get();

    return $allData; 
    }  
}
