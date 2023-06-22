<?php

namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
       
      
        return view('pages.Teachers.Teachers',compact('Teachers'));
    }

    public function create()
    {
      
         $genders = $this->Teacher->GetGender();
         return view('pages.Teachers.create',compact('genders'));
    }


    public function store(StoreTeachers $request)
    {
      return $this->Teacher->StoreTeachers($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
      
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.edit',compact('Teachers','genders'));
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
