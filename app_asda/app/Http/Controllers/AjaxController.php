<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Get Classrooms
    public function getClassrooms($id)
    {
        $user = auth()->user();
        return Classroom::where("Grade_id", $id)
            ->whereHas('teachers', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })
            ->pluck("Name_Class", "id");

        
        
       
    }
   

    //Get Sections
    public function Get_classrooms($id){

        
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;

    }
}