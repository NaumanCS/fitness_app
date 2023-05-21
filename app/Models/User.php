<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role', 'password', 'phone_verified_at', 'image', 'email', 'phone', 'diet_id', 'intensity_id', 'active_id', 'target_weight_unit', 'target_weight', 'weight_unit', 'weight', 'height', 'age', 'gender', 'goal_id', 'name', 'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute()
    {
        if ($this->attributes['image'] == null) {
            return asset('uploads/goals/default.jpg');
        }
        return asset('uploads/user') . '/' . $this->attributes['image'];
    }

    public function diet()
    {
        return $this->hasOne(Diet::class, 'id', 'diet_id');
    }

    public function intensity()
    {
        return $this->hasOne(Intensity::class, 'id', 'intensity_id');
    }

    public function active()
    {
        return $this->hasOne(ActiveState::class, 'id', 'active_id');
    }

    public function goal()
    {
        return $this->hasOne(Goals::class, 'id', 'goal_id');
    }
}
