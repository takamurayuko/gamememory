<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $platforms = [
        'NintendoSwitch', 'ＰＳ４ＰＳ５', 'Ｘｂｏｘ', 'ＰＣ', 'その他' ];

    foreach ($platforms as $platform) {
        DB::table('platforms')->insert(['machine_name' => $platform]);
        }
    }
}
