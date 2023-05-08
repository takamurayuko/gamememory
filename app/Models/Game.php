<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    protected $fillable = [
        'title',
        'image_path',
    ];

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
    

    public function start_date($default_value = '')
    {
        return ($this->duration->start_date != '' ? $this->duration->start_date : $default_value);
    }
    
    public function end_date($default_value = '')
    {
        return ($this->duration->end_date != '' ? $this->duration->end_date : $default_value);
    }
    
    public function play_time($default_value = '')
    {
        return ($this->duration->play_time != '' ? $this->duration->play_time : $default_value); 
    }
    
     public function url($default_value = '')
    {
        return ($this->duration->url != '' ? $this->duration->url : $default_value); 
    }
}
