<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Demo extends Authenticatable 
{
    use Notifiable;

    protected $table = 'demo';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'dob',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}