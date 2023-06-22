<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAvecVente extends Model
{
   
    protected $table = 'event_avec_vente';
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
