<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;
    protected $fillable = ['name','term','academic_year'];
    public $translatable = ['name'];
 
    public function subject()
{
    return $this->belongsTo(Subject::class, 'subject_id');
}

}
