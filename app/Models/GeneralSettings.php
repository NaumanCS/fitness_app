<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $fillable = ['logo'];

    public function getLogoAttribute()
    {
        if ($this->attributes['logo'] == null) {
            return asset('uploads/goals/default.jpg');
        }
        return asset('uploads/general-settings'). '/' .$this->attributes['logo'];
    }
}
