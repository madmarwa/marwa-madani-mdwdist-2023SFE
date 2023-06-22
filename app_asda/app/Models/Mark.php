<?php

namespace App\Models;

use App\User;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Mark extends Model
{
    use HasTranslations;
    public $translatable = ['name' ];
  
    protected $guarded =[];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
  

    public function my_class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
