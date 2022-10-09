<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatinStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('catin_statuses')->truncate();
        \DB::table('catin_statuses')->insert([
            [
                'name' => 'Active'
            ],
            [
                'name' => 'Disable'
            ],
        ]);
    }
}
