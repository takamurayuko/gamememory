<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_date',
        'end_date',
        'play_time',
    ];
    
        public function game()
    {
        return $this->hasOne(Game::class);
    }
    
}
