<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programas extends Model
{
    use HasFactory;
    protected $table = 'programas';
    protected $primaryKey = 'id_programa';
    public $incrementing = false;

    protected $fillable = [
        'id_programa',
        'programa',
        'id_padre',
        'estado'
    ];
    public function documentos()
    {
        return $this->hasMany(Documentos::class);
    }
    public function flujoTramites()
    {
        return $this->hasMany(FlujoTramite::class);
    }
    public function flujoDocumentos()
    {
        return $this->hasMany(FlujoDocumentos::class);
    }
}