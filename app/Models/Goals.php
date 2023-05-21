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
        return asset('uploads/goals/default.jpg');
        }
        return asset('uploads/goals'). '/'. $this->attributes['image'];
    }
}
