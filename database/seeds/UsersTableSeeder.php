<?php

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
    {//test acount for owner previledges
        DB::table('users')->insert([
            'name' => 'Owner',
            'email'=> 'Owner@gmail.com',
            'password' => bcrypt('abcd@123456'),
            'privilege' => "Owner"            
        ]);
    }
}
