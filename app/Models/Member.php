<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDelete;

    protected $fillable = [
        'name',
        'email',
        'email_token',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at',
    ];
}
