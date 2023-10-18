<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlujoTramite extends Model
{
    use HasFactory;
    protected $table = 'flujo_tramite';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_tramite',
        'id_programa',
        'orden',
        'tiempo',
        'estado'
    ];
    public function tipoTramite()
    {
        return $this->belongsTo(\Modules\Hermes\Entities\TipoTramite::class);
    }

    public function programa()
    {
        return $this->belongsTo(\Modules\Hermes\Entities\Programas::class);

    }
   
}
