<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('users')->truncate();
        \DB::table('users')->insert([
            [
                'username' => 'penyuluh',
                'email'  => 'penyuluh@penyuluh.com',
                'password' => bcrypt('penyuluh'),
                'role_id' => 1,
                'name' => 'Penyuluh',
                'no_hp' => '081233334444',
                'village_id' => 2,
            ],
            [
                'username' => 'pkk',
                'email'  => 'pkk@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'PKK',
                'no_hp' => '081233334444',
                'village_id' => 5,
            ],
            [
                'username' => 'kader',
                'email'  => 'kader@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Kader',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'bidan',
                'email'  => 'bidan@bidan.com',
                'password' => bcrypt('bidan123'),
                'role_id' => 4,
                'name' => 'Bidan',
                'no_hp' => '081233334444',
                'village_id' => 3,
            ],

            // user additional data
            
            // desa Arjasa
            // tim 1
            [
                'username' => 'arikabidan',
                'email'  => 'arika@bidan.com',
                'password' => bcrypt('bidan123'),
                'role_id' => 4,
                'name' => 'Arika Safitri',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'rohlianapkk',
                'email'  => 'rohliana@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Rohliana Candra Dewi',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'imronpkk',
                'email'  => 'imron@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Imron Rosady',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],

            // tim 2
            [
                'username' => 'iftahulbidan',
                'email'  => 'iftahul@bidan.com',
                'password' => bcrypt('bidan123'),
                'role_id' => 3,
                'name' => 'Iftahul Huda',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'hairulpkk',
                'email'  => 'hairul@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Hairul Nuraini',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'ratnapkk',
                'email'  => 'ratna@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Ratna',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            // tim 3
            [
                'username' => 'sigitkader',
                'email'  => 'sigit@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 2,
                'name' => 'Sigit Abdul Hadi',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'apriyantopkk',
                'email'  => 'apriyanto@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Apriyanto',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'samharipkk',
                'email'  => 'samhari@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Samhari',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            // tim 4
            [
                'username' => 'idriskader',
                'email'  => 'idris@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 2,
                'name' => 'Muh. Idris',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'nanangpkk',
                'email'  => 'nanang@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Nanang Mufti Hidayat',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'pujipkk',
                'email'  => 'puji@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Puji Nastiti',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            // tim 5
            [
                'username' => 'sitikader',
                'email'  => 'siti@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Siti Nur Hasanah',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'rustamkader',
                'email'  => 'rustam@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Rustam',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'ahmadpkk',
                'email'  => 'ahmad@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Ahmad Susanto',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            // tim 6
            [
                'username' => 'ahmadpkk',
                'email'  => 'ahmad@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Ahmad Chosil',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'marsunkader',
                'email'  => 'marsun@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Marsun',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'sripkk',
                'email'  => 'sri@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Sri Wahyuni',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            // tim 7
            [
                'username' => 'juhairiyahpkk',
                'email'  => 'juhairiyah@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Juhairiyah',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'juhairiyakader',
                'email'  => 'juhairiya@kader.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 3,
                'name' => 'Juhairiya',
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],
            [
                'username' => 'abdulpkk',
                'email'  => 'abdul@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => "Abdul Mu'is",
                'no_hp' => '081233334444',
                'village_id' => 1,
            ],

            // desa Biting
            // tim 1
            [
                'username' => 'tribidan',
                'email'  => 'tri@bidan.com',
                'password' => bcrypt('bidan123'),
                'role_id' => 4,
                'name' => 'Tri Wahyu Media A.',
                'no_hp' => '081233334444',
                'village_id' => 3,
            ],
            [
                'username' => 'ekawatipkk',
                'email'  => 'ekawati@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'Ekawati Dian A.',
                'no_hp' => '081233334444',
                'village_id' => 3,
            ],
            [
                'username' => 'sitipkk',
                'email'  => 'siti@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => "Siti Andriyana",
                'no_hp' => '081233334444',
                'village_id' => 3,
            ],
            // tim 2
            // tim 3
            // tim 4
            // tim 5

            // desa Candijati
            // tim 1
            // tim 2
            // tim 3
            // tim 4

            // desa Darsono
            // tim 1
            // tim 2
            // tim 3
            // tim 4
            // tim 5

            // desa Kamal
            // tim 1
            // tim 2
            // tim 3
            // tim 4

            // desa Kemuning lor
            // tim 1
            // tim 2
            // tim 3
            // tim 4
            // tim 5
            // tim 6
        ]);
    }
}
