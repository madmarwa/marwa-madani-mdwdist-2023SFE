<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class event extends Model
{
    use HasFactory;
  
    use HasTranslations;
    public $translatable = ['nameEvent', 'lieuEvent'];

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'events'; // Table principale utilisée par défaut

    // ...

    public function eventAvecVente()
    {
        return $this->hasOne(EventAvecVente::class, 'event_id');
    }

    public function eventSansVente()
    {
        return $this->hasOne(EventSansVente::class, 'event_id');
    }

}
