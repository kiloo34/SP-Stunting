<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('teams')->truncate();
        \DB::table('teams')->insert([
            [
                'name' => 'tim 1',
            ],
            [
                'name' => 'tim 2',
            ],
            [
                'name' => 'tim 3',
            ],
            [
                'name' => 'tim 4',
            ]
        ]);
    }
}
