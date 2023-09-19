<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombres', 'apellido_paterno', 'apellido_materno', 'ci', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
}