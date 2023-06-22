<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->delete();

        $genders = [
            ['fr'=> 'Male', 'ar'=> 'ذكر'],
            ['fr'=> 'Female', 'ar'=> 'انثي'],

        ];
        foreach ($genders as $ge) {
           
            Gender::create(['Name' => $ge]);
        }
    }
}
