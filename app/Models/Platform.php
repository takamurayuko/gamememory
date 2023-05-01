<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    
        public function games()
    {
        return $this->hasMany(Game::class);
    }
    //機種リスト
    public static $platform_list = [
        'Nintendo Switch',
        'PS4/PS5',
        'Xbox',
        'PC',
        'その他',
    ];
}
