<?php
namespace Database\Seeders;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => '  احمد احمد ', 'en' => 'Ahmed ahmed'];
       
    
        $students->gender_id = 1;
        $students->greffe_cochlee='nonsubi';

        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
       
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();

        $students = new Student();
        $students->name = ['ar' => ' سناء سناء ', 'en' => 'sana sana '];
       
    
        $students->gender_id = 2;
        $students->greffe_cochlee='subi';
        $students->date_greffe_cochlee='2005-01-01';

        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
       
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();

        $students = new Student();
        $students->name = ['ar' => '  سالم سالم ', 'en' => 'salem salem'];
       
    
        $students->gender_id = 1;
        $students->greffe_cochlee='nonsubi';

        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
       
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
      
       
        
    }
}
