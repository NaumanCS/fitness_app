<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image',
    ];

    public function getImageAttribute(){
        if ($this->attributes['image'] == null) {
        return '<img width="50px" src="'.asset('uploads/goals/default.jpg').'"/>';
        }
        return '<img width="50px" src="'.asset('uploads/goals'). '/'. $this->attributes['image'].'"/>';
    }
}
