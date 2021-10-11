<?php

use Illuminate\Database\Seeder;

class medicineTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  this code enters fake test data data
        DB::table('medicine')->insert([
            'fullname' => 'Panadol',
            'weight'=> 40,
            'quantity'=> '30',
            'manufacturer' => Str::random(10).' PVT',
            'expiration' => '2022-08-26'
            
        ]);

        
        DB::table('medicine')->insert([
            'fullname' => 'alermine',
            'weight'=> 40,
            'quantity'=> '30',
            'manufacturer' => Str::random(10).' PVT',
            'expiration' => '2022-08-26'
            
        ]);

        
        DB::table('medicine')->insert([
            'fullname' => 'lomac',
            'weight'=> 40,
            'quantity'=> '30',
            'manufacturer' => Str::random(10).' PVT',
            'expiration' => '2022-08-26'
            
        ]);

        
        DB::table('medicine')->insert([
            'fullname' => 'glychopan',
            'weight'=> 40,
            'quantity'=> '30',
            'manufacturer' => Str::random(10).' PVT',
            'expiration' => '2022-08-26'
            
        ]);
    }
}
