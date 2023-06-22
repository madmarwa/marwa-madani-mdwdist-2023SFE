<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_live extends Model
{
    use HasFactory;
    protected $fillable=['title','start'];
}
