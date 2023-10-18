<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Role extends Model
{
    protected $fillable = ['role_name', 'description', 'estado'];
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany(User::class, 'usuario_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permisos', 'role_id', 'permission_id');
    }
}
