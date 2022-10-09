<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('catin')->truncate();
        \DB::table('catin')->insert([
            [
                'name' => 'Siti',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'address' => 'ini alamat dump',
                'village_id' => 1 
            ],
            [
                'name' => 'Icha',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'address' => 'ini alamat dump',
                'village_id' => 2
            ],
            [
                'name' => 'Kirana',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'address' => 'ini alamat dump',
                'village_id' => 3 
            ],
            [
                'name' => 'Dela',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'address' => 'ini alamat dump',
                'village_id' => 4 
            ]
        ]);
    }
}
