<?php
use App\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'bemy@gmail.com')->first();
        if(!$user){
            User::create([
                'name'=>'Fati Wap',
                'email' => 'bemy@gmail.com',
                'role' => 'admin',
                'membership' => 'master',
                'password' => Hash::make('Paradice')
            ]);
        }
    }
}
