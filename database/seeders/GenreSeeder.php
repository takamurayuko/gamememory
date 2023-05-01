<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;


class GenreSeeder extends Seeder
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
        Genre::create(['genre_name' => $genre]);
        }
    }
}
