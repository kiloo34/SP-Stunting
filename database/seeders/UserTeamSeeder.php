<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('user_teams')->truncate();
        \DB::table('user_teams')->insert([
            [
                'team_id' => 1,
                'user_id' => 5,
                'as_user' => 'Bidan',
                'village_id' => 1
            ],
            [
                'team_id' => 1,
                'user_id' => 6,
                'as_user' => 'Sub PPKBD',
                'village_id' => 1
            ],
            [
                'team_id' => 1,
                'user_id' => 7,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],

            [
                'team_id' => 2,
                'user_id' => 8,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],
            [
                'team_id' => 2,
                'user_id' => 9,
                'as_user' => 'Sub PPKBD',
                'village_id' => 1
            ],
            [
                'team_id' => 2,
                'user_id' => 10,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],

            [
                'team_id' => 3,
                'user_id' => 11,
                'as_user' => 'Kasun',
                'village_id' => 1
            ],
            [
                'team_id' => 3,
                'user_id' => 12,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],
            [
                'team_id' => 3,
                'user_id' => 13,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],

            [
                'team_id' => 4,
                'user_id' => 14,
                'as_user' => 'Perangkat Desa',
                'village_id' => 1
            ],
            [
                'team_id' => 4,
                'user_id' => 15,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],
            [
                'team_id' => 4,
                'user_id' => 16,
                'as_user' => 'Kader',
                'village_id' => 1
            ],

            [
                'team_id' => 5,
                'user_id' => 17,
                'as_user' => 'Kader PKK',
                'village_id' => 1
            ],
            [
                'team_id' => 5,
                'user_id' => 18,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],
            [
                'team_id' => 5,
                'user_id' => 9,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],

            [
                'team_id' => 6,
                'user_id' => 20,
                'as_user' => 'Kasun',
                'village_id' => 1
            ],
            [
                'team_id' => 6,
                'user_id' => 21,
                'as_user' => 'TOMA',
                'village_id' => 1
            ],
            [
                'team_id' => 6,
                'user_id' => 22,
                'as_user' => 'Sub PPKBD',
                'village_id' => 1
            ],

            [
                'team_id' => 7,
                'user_id' => 23,
                'as_user' => ' PPKBD',
                'village_id' => 1
            ],
            [
                'team_id' => 7,
                'user_id' => 24,
                'as_user' => 'Sub PPKBD',
                'village_id' => 1
            ],
            [
                'team_id' => 7,
                'user_id' => 25,
                'as_user' => 'Kasun',
                'village_id' => 1
            ],

            [
                'team_id' => 1,
                'user_id' => 26,
                'as_user' => 'Paramedis/Perawat',
                'village_id' => 3
            ],
            [
                'team_id' => 1,
                'user_id' => 27,
                'as_user' => 'Sub PPKBD',
                'village_id' => 3
            ],
            [
                'team_id' => 1,
                'user_id' => 28,
                'as_user' => 'Kader TP-PKK',
                'village_id' => 3
            ],
        ]);
    }
}
