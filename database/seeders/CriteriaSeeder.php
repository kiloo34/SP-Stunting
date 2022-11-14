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
                'value' => 5,
                'as' => 'umur'
            ],
            [
                'name' => 'hb',
                'value' => 4,
                'as' => 'hemoglobin'
            ],
            [
                'name' => 'imt',
                'value' => 3,
                'as' => 'indek massa tubuh'
            ],
            [
                'name' => 'lila',
                'value' => 2,
                'as' => 'lingkar langan atas'
            ],
            [
                'name' => 'merokok',
                'value' => 1,
                'as' => 'merokok'
            ],
        ]);
    }
}
