<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatinCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('catin_criterias')->truncate();
        \DB::table('catin_criterias')->insert([
            [
                'catin_id' => 1,
                'criteria_id' => 1,
                'value' => 39,
                'conversion' => 3,
            ],
            [
                'catin_id' => 1,
                'criteria_id' => 2,
                'value' => 11.5,
                'conversion' => 1,
            ],
            [
                'catin_id' => 1,
                'criteria_id' => 3,
                'value' => 17.6,
                'conversion' => 4,
            ],
            [
                'catin_id' => 1,
                'criteria_id' => 4,
                'value' => 27,
                'conversion' => 1,
            ],
            [
                'catin_id' => 1,
                'criteria_id' => 5,
                'value' => 1,
                'conversion' => 5,
            ],

            [
                'catin_id' => 2,
                'criteria_id' => 1,
                'value' => 39,
                'conversion' => 5,
            ],
            [
                'catin_id' => 2,
                'criteria_id' => 2,
                'value' => 11.5,
                'conversion' => 1,
            ],
            [
                'catin_id' => 2,
                'criteria_id' => 3,
                'value' => 17.6,
                'conversion' => 3,
            ],
            [
                'catin_id' => 2,
                'criteria_id' => 4,
                'value' => 27,
                'conversion' => 1,
            ],
            [
                'catin_id' => 2,
                'criteria_id' => 5,
                'value' => 1,
                'conversion' => 1,
            ],
            
            [
                'catin_id' => 3,
                'criteria_id' => 1,
                'value' => 23,
                'conversion' => 1,
            ],
            [
                'catin_id' => 3,
                'criteria_id' => 2,
                'value' => 14.3,
                'conversion' => 1,
            ],
            [
                'catin_id' => 3,
                'criteria_id' => 3,
                'value' => 19.1,
                'conversion' => 1,
            ],
            [
                'catin_id' => 3,
                'criteria_id' => 4,
                'value' => 23,
                'conversion' => 3,
            ],
            [
                'catin_id' => 3,
                'criteria_id' => 5,
                'value' => 1,
                'conversion' => 5,
            ],
            
            [
                'catin_id' => 4,
                'criteria_id' => 1,
                'value' => 24,
                'conversion' => 1,
            ],
            [
                'catin_id' => 4,
                'criteria_id' => 2,
                'value' => 12.1,
                'conversion' => 1,
            ],
            [
                'catin_id' => 4,
                'criteria_id' => 3,
                'value' => 19.3,
                'conversion' => 1,
            ],
            [
                'catin_id' => 4,
                'criteria_id' => 4,
                'value' => 20,
                'conversion' => 3,
            ],
            [
                'catin_id' => 4,
                'criteria_id' => 5,
                'value' => 1,
                'conversion' => 5,
            ],

            [
                'catin_id' => 5,
                'criteria_id' => 1,
                'value' => 19,
                'conversion' => 5,
            ],
            [
                'catin_id' => 5,
                'criteria_id' => 2,
                'value' => 11.6,
                'conversion' => 1,
            ],
            [
                'catin_id' => 5,
                'criteria_id' => 3,
                'value' => 21.3,
                'conversion' => 1,
            ],
            [
                'catin_id' => 5,
                'criteria_id' => 4,
                'value' => 23.5,
                'conversion' => 1,
            ],
            [
                'catin_id' => 5,
                'criteria_id' => 5,
                'value' => 1,
                'conversion' => 5,
            ],
        ]);
    }
}
