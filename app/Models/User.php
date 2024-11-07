<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory;

    // Menentukan bahwa ID akan bertipe string (UUID) dan tidak auto-increment
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'address',
        'nik',
        'phone',
        'emergency_phone',
        'level',
        'profile_picture',
        'date_of_birth',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
    ];

    /**
     * Boot method untuk UUID pada ID.
     */
    protected static function boot()
    {
        parent::boot();

        // Menggunakan UUID saat membuat user baru
        static::creating(function ($user) {
            $user->id = (string) Str::uuid();
        });
    }
}
