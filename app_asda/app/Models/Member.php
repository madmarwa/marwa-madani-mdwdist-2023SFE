<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded=[];
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }


}
