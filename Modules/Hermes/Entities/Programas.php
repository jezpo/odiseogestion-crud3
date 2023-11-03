<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programas extends Model
{
    use HasFactory;
    protected $table = 'programas';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $casts = [
        'id_programa' => 'string',
    ];
    
    protected $fillable = [
        'id_programa',
        'programa',
        'id_padre',
        'estado'
    ];
    public function documentos()
    {
        return $this->hasMany(Documentos::class, 'id_programa', 'id');
    }
    public function flujoTramites()
    {
        return $this->hasMany(FlujoTramite::class, 'id_programa', 'id');
    }
    //cambios en la relacion
    public function flujoDocumentos()
    {
        return $this->hasMany(FlujoDocumentos::class, 'id_programa', 'id');
    }
    
}
