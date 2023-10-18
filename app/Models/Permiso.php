<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permisos';
    protected $fillable = ['permission_name', 'description', 'estado'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permisos', 'permission_id', 'role_id');
    }

    public function isActivo() {
        return $this->estado === 'A';
    }

    public function activate() {
        $this->estado = 'A';
        $this->save();
    }

    public function deactivate() {
        $this->estado = 'I';
        $this->save();
    }
}
