<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// HasApiTokens er line ta kete dewa hoyeche karon eta API er jonno lage

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Ekhan thekeo HasApiTokens soriye dewa hoyeche

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'otp',
        'otp_expires_at',
        'is_active',
        'google_id',
        'phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
