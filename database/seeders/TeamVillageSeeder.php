<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamVillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('team_villages')->truncate();
        \DB::table('team_villages')->insert([
            [
                'team_id' => 1,
                'village_id' => 1,
            ],
            [
                'team_id' => 2,
                'village_id' => 1,
            ],
            [
                'team_id' => 3,
                'village_id' => 1,
            ],
            [
                'team_id' => 4,
                'village_id' => 1,
            ],
            [
                'team_id' => 5,
                'village_id' => 1,
            ],
            [
                'team_id' => 6,
                'village_id' => 1,
            ],
            [
                'team_id' => 7,
                'village_id' => 1,
            ],

            [
                'team_id' => 1,
                'village_id' => 3,
            ],
            [
                'team_id' => 2,
                'village_id' => 3,
            ],
            [
                'team_id' => 3,
                'village_id' => 3,
            ],
            [
                'team_id' => 4,
                'village_id' => 3,
            ],
            [
                'team_id' => 5,
                'village_id' => 3,
            ],

            [
                'team_id' => 1,
                'village_id' =>5,
            ],
            [
                'team_id' => 2,
                'village_id' =>5,
            ],
            [
                'team_id' => 3,
                'village_id' =>5,
            ],
            [
                'team_id' => 4,
                'village_id' =>5,
            ],

            [
                'team_id' => 1,
                'village_id' => 4,
            ],
            [
                'team_id' => 2,
                'village_id' => 4,
            ],
            [
                'team_id' => 3,
                'village_id' => 4,
            ],
            [
                'team_id' => 4,
                'village_id' => 4,
            ],
            [
                'team_id' => 5,
                'village_id' => 4,
            ],

            [
                'team_id' => 1,
                'village_id' =>6,
            ],
            [
                'team_id' => 2,
                'village_id' =>6,
            ],
            [
                'team_id' => 3,
                'village_id' =>6,
            ],
            [
                'team_id' => 4,
                'village_id' =>6,
            ],

            [
                'team_id' => 1,
                'village_id' => 2,
            ],
            [
                'team_id' => 2,
                'village_id' => 2,
            ],
            [
                'team_id' => 3,
                'village_id' => 2,
            ],
            [
                'team_id' => 4,
                'village_id' => 2,
            ],
            [
                'team_id' => 5,
                'village_id' => 2,
            ],
            [
                'team_id' => 6,
                'village_id' => 2,
            ],
        ]);
    }
}
