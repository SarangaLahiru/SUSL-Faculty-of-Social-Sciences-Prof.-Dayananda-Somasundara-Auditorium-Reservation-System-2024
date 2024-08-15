<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Optional if you're using Sanctum

class User extends Authenticatable
{
    use Notifiable, HasApiTokens; // HasApiTokens is optional

    protected $fillable = [
        'first_name',
        'last_name',
        'NIC',
        'phone_number',
        'email',
        'student_no',
        'faculty',
        'department',
        'institution',
        'division',
        'society',
        'post',
        'address',
        'category',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}