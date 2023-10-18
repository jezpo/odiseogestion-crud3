<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends  Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombres', 'apellido_paterno', 'apellido_materno', 'username', 'password_hash', 'ci', 'foto']; // Añade 'foto' si quieres que sea asignable masivamente

    protected $hidden = ['password_hash'];  // Atributos ocultos para arrays

    protected $casts = [
        'foto' => 'binary',
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'usuario_roles', 'user_id', 'role_id')->withTimestamps();
    }
}
