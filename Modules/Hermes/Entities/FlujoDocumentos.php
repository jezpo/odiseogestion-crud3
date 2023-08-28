<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlujoDocumentos extends Model
{
    use HasFactory;

    protected $table = 'flujo_documentos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_documento',
        'fecha_recepcion',
        'id_programa',
        'obs'
    ];

    public function documento()
    {
        return $this->belongsTo(Documentos::class);
    }
    public function programas()
    {
        return $this->belongsto(Programas::class);
    }
}
