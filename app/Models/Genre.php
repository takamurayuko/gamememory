<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
        
        // Genre.php
    public function games()
    {
        return $this->hasMany(Game::class);
    }
     // ジャンルのリストを定義
    public static $genre_list = [
        'RPG', 'アクション', 'シミュレーション', 'アドベンチャー',
        'シューティング', 'レーシング', 'パズル', '音楽', 'その他'
    ];
}
