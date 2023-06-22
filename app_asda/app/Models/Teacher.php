<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends  Authenticatable
{
    use Notifiable;
    use HasTranslations;
    public $translatable = ['Name', 'specialization'];
    protected $guarded=[];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
  
    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }

// علاقة المعلمين مع الاقسام
public function classrooms()
{
    return $this->belongsToMany(Classroom::class, 'subjects', 'teacher_id', 'classroom_id');
}
public function subjects()
{
    return $this->hasMany(Subject::class);
}
public function exam()
{
    return $this->hasMany(Exam::class);
}

}
