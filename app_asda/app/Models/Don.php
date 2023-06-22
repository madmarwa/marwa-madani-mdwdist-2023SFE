<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Don extends Model
{
    use HasFactory;
   
   
    protected $guarded=[];
    public function donateur()
    {
        return $this->belongsTo('App\Models\Donateur', 'donateur_id');
    } 
}
