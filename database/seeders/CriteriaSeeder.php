<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('criterias')->truncate();
        \DB::table('criterias')->insert([
            [
                'name' => 'umur',
                'value' => 5
            ],
            [
                'name' => 'hb',
                'value' => 4
            ],
            [
                'name' => 'imt',
                'value' => 3
            ],
            [
                'name' => 'lila',
                'value' => 2
            ],
            [
                'name' => 'merokok',
                'value' => 1
            ],
        ]);
    }
}
