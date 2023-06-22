<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\ParentsTableSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\ClassroomTableSeeder;
use Database\Seeders\GenderTableSeeder;
use Database\Seeders\SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
       
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
     $this->call(UserSeeder::class);
        /*$this->call(GradeSeeder::class);
        $this->call(ClassroomTableSeeder::class);*/
      
       $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
       /* $this->call(ParentsTableSeeder::class);*/
       /* $this->call(StudentsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);*/
        
    }
}
