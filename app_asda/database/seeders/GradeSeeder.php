<?php
namespace Database\Seeders;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();
        $grades = [
            ['fr'=> 'Primary stage', 'ar'=> 'المرحلة التحضيرية'],
            ['fr'=> 'middle School', 'ar'=> 'المرحلة الابتدائية'],
            ['fr'=> 'High school', 'ar'=> 'المرحلة المهنية '],
        ];

        foreach ($grades as $grade) {
            Grade::create(['Name' => $grade]);
        }

    }
}
