<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EventSansVente extends Model
{
  
    protected $table = 'event_sans_vente';
    public $timestamps = false;
    protected $fillable = [
       
        'fraisEvent',
       
    ];
}
