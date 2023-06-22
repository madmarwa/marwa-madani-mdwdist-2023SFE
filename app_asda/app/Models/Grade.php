<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    

        use HasTranslations;
        public $translatable = ['Name'];
    
        protected $fillable=['Name','Notes'];
        //protected $table = 'Grades';

        public $timestamps = true;
    
        public function subjects()
        {
            return $this->hasMany(Subject::class);
        }
        /*public function scopeFilter(Builder $builder , $filters){
            $builder->when($filters['Name'] ?? false , function ($builder, $value){
              $builder->where('Name', 'LIKE', "%{$value}%");
            });
            
        }
    */
    
}
