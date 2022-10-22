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
                'name' => 'umur'
            ],
            [
                'name' => 'hb'
            ],
            [
                'name' => 'imt'
            ],
            [
                'name' => 'lila'
            ],
            [
                'name' => 'merokok'
            ],
        ]);
    }
}
