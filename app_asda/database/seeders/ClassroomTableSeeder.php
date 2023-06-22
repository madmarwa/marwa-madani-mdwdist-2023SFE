<?php
namespace Database\Seeders;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['fr'=> 'First grade', 'ar'=> 'قسم الاول'],
            ['fr'=> 'Second grade', 'ar'=> 'قسم الثاني'],
            ['fr'=> 'Third grade', 'ar'=> 'قسم الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name_Class' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
