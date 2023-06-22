<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            DB::table('users')->delete();
            $user = new User();
           
            $user->name = ['ar' => 'مروة مدني', 'fr' => 'marwa madani'];
            $user->email='madanimarwa40@gmail.com';
            $user->password = Hash::make('12345678');
            $user->save();
       
    }
}
