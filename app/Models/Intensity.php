<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intensity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'time', 'calories_burn',
    ];
}
