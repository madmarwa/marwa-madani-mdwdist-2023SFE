<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;

    use HasTranslations;
    public $translatable = ['name' ];
  
    protected $guarded =[];

    // relation pour recuperer le gender

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

 // relation pour recuperer le niveau

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

 // relation pour recuperer le classe

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }


    //image

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }


    
//parent


    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }

  

 //note
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

}
