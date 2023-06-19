<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'description', 'calories',
    ];

    public function getImageAttribute(){
        if ($this->attributes['image'] == null) {
        return asset('uploads/goals/default.jpg');
        }
        return asset('uploads/foods'). '/'. $this->attributes['image'];
    }
}
