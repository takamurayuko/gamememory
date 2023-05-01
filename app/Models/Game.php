<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
        public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
    
    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
    
}
