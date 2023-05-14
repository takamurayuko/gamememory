<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;


class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
        'RPG', 'アクション', 'シミュレーション', 'アドベンチャー',
        'シューティング', 'レーシング', 'パズル', '音楽', 'その他'
        ];

    foreach ($genres as $genre) {
        DB::table('genres')->insert(['genre_name' => $genre]);
        }
    }
}
