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
                // 'address' => ''
            ],
            [
                'username' => 'pkk',
                'email'  => 'pkk@pkk.com',
                'password' => bcrypt('pkkpkk'),
                'role_id' => 2,
                'name' => 'PKK',
                'no_hp' => '081233334444',
                // 'address' => ''
            ],
            [
                'username' => 'kader',
                'email'  => 'kader@kader.com',
                'password' => bcrypt('kader123'),
                'role_id' => 3,
                'name' => 'Kader',
                'no_hp' => '081233334444',
                // 'address' => ''
            ],
            [
                'username' => 'bidan',
                'email'  => 'bidan@bidan.com',
                'password' => bcrypt('bidan123'),
                'role_id' => 4,
                'name' => 'Bidan',
                'no_hp' => '081233334444',
                // 'address' => ''
            ]
        ]);
    }
}
