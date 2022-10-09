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
                'name' => 'Munifah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '32',
                'address' => 'ini alamat dump',
                'village_id' => 1 ,
                'status_id' => 1
            ],
            [
                'name' => 'Wardatul Hoiriyah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '20',
                'address' => 'ini alamat dump',
                'village_id' => 2,
                'status_id' => 1
            ],
            [
                'name' => 'Dewi Nur Aini',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '23',
                'address' => 'ini alamat dump',
                'village_id' => 3 ,
                'status_id' => 1
            ],
            [
                'name' => 'Ila Wardiyah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '24',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'RIKA',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '19',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Misnaya',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '19',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Halima',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '22',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Siti Marifah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '20',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Koyim',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '17',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Wiwin Husniah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '21',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Siti Marifah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '20',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Sofianatul Hasanah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '19',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Laily Agustin',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '22',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Ifatun Nisak',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '24',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Refika Amfelia Febiola',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '22',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Siti Maimunah',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '28',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
            [
                'name' => 'Yulia Tri Susanti',
                'nik' => '2945824929492941',
                'no_hp' => '081233334444',
                'age' => '26',
                'address' => 'ini alamat dump',
                'village_id' => 4 ,
                'status_id' => 1
            ],
        ]);
    }
}
