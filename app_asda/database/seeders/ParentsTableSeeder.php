<?php
namespace Database\Seeders;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
            $my_parents = new My_Parent();
            $my_parents->email = 'ali.ali@yahoo.com';
        
            $my_parents->Name_Father = ['fr' => 'ali ali', 'ar' => 'على عليّ'];
            $my_parents->National_ID_Father = '12345678';
        
            $my_parents->Phone_Father = '12345678';
            $my_parents->Job_Father = ['fr' => 'programmer', 'ar' => 'مبرمج'];
           
            $my_parents->Address_Father ='حومة سوق جربة ';
            $my_parents->Name_Mother = ['fr' => 'samira', 'ar' => 'سميرة'];
            $my_parents->National_ID_Mother = '1234567810';
        
            $my_parents->Phone_Mother = '1234567810';
            $my_parents->Job_Mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
          
            $my_parents->Address_Mother ='حومة سوق جربة';
            $my_parents->save();

            $my_parents = new My_Parent();
            $my_parents->email = 'sami.sami@yahoo.com';
        
            $my_parents->Name_Father = ['fr' => 'sami sami', 'ar' => 'سامي سامي'];
            $my_parents->National_ID_Father = '12345678';
        
            $my_parents->Phone_Father = '12345678';
            $my_parents->Job_Father = ['fr' => 'programmer', 'ar' => 'مبرمج'];
           
            $my_parents->Address_Father ='حومة سوق جربة ';
            $my_parents->Name_Mother = ['fr' => 'aya', 'ar' => 'آية'];
            $my_parents->National_ID_Mother = '1234567810';
        
            $my_parents->Phone_Mother = '1234567810';
            $my_parents->Job_Mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
          
            $my_parents->Address_Mother ='حومة سوق جربة';
            $my_parents->save();
           

    }
}
