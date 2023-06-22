<?php
namespace Database\Seeders;




use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['fr'=> 'langue des signes', 'ar'=> 'لغة الإشارة'],
            ['fr'=> 'orthophoniste', 'ar'=> 'أخصائي تخاطب'],
            ['fr'=> 'psychologue', 'ar'=> 'عالِم نَفْسانِيّ'],
            ['fr'=> 'English', 'ar'=> ' خياطة وفصالة'],
            ['fr'=> 'arabic', 'ar'=> 'عربي'],
        ];
        foreach ($specializations as $S) {
          
            Specialization::create(['Name' => $S]);
        }
    }
}
