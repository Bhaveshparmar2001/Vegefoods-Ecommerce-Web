<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
          'name', 'email', 'phone', 'role', 'photo', 'password', 'status', 'email_verified_at', 'remember_token',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
