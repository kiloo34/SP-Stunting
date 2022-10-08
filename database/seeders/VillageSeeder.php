<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('villages')->truncate();
        \DB::table('villages')->insert([
            [
                'name' => 'Arjasa'
            ],
            [
                'name' => 'Kemuning Lor'
            ],
            [
                'name' => 'Biting'
            ],
            [
                'name' => 'Darsono'
            ],
            [
                'name' => 'Candijati'
            ],
            [
                'name' => 'Kamal'
            ],
        ]);
    }
}
