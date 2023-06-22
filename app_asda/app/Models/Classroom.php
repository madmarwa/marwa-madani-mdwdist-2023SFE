<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Class'];


    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_id'];


    // grades:niveau relation

    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function teachers()
{
    return $this->belongsToMany(Teacher::class, 'subjects', 'classroom_id', 'teacher_id');
}
public function subjects()
{
    return $this->belongsToMany(Subject::class, 'classroom_subject', 'classroom_id', 'subject_id');
}

}