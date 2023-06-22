<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }

    public function SoftDelete($request)
{
    $studentIds = $request->input('student_ids');
    if (!is_array($studentIds)) {
        $studentIds = [$studentIds];
    }

    if (empty($studentIds)) {
        return redirect()->back()->with('error_Graduated', __(trans('main_trans.infou')));
    }

    student::whereIn('id', $studentIds)->delete();

    toastr()->success(trans('messages.success'));

    return redirect()->route('Graduated.index');
}

    public function ReturnData($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


}
