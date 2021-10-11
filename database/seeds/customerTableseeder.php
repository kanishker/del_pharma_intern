<?php

use Illuminate\Database\Seeder;

class customerTableseeder extends Seeder
{
    /**
     * this code enters fake test data data 
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_customers')->insert([
            'fullname' => 'Johnathan Davis',
            'contact'=>'077454871',
            'adress'=> Str::random(30),
            'email' => Str::random(10).'@gmail.com',
            
        ]);

        DB::table('tbl_customers')->insert([
            'fullname' => 'Kane Davis',
            'contact'=>'077454871',
            'adress'=> Str::random(30),
            'email' => Str::random(10).'@gmail.com',
            
        ]);
        
        DB::table('tbl_customers')->insert([
            'fullname' => 'Johnathan Mike',
            'contact'=>'077454871',
            'adress'=> Str::random(30),
            'email' => Str::random(10).'@gmail.com',
            
        ]);

        DB::table('tbl_customers')->insert([
            'fullname' => 'Stuart Davis',
            'contact'=>'077454871',
            'adress'=> Str::random(30),
            'email' => Str::random(10).'@gmail.com',
            
        ]);
    }
}
