<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class FlujoDocuments extends Model
{
    use HasFactory;

    protected $table = 'flujo_documentos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_documento',
        'fecha_recepcion',
        'fecha_envio',
        'id_programa',
        'obs'
    ];

    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'id_documenmto', 'id');
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class, 'id_programa');
    }

    public static function fetchWithDocumentCiteAndProgramName()
    {
        return DB::table('flujo_documentos')
            ->select(
                'flujo_documentos.id',
                'documentos.cite',
                'origen.programa as programa_origen',
                'destino.programa as programa_destino',
                'flujo_documentos.fecha_recepcion',
                'flujo_documentos.fecha_envio',
                'flujo_documentos.obs'
            )
            ->join('documentos', 'flujo_documentos.id_documento', '=', 'documentos.id')
            ->join('programas as origen', 'flujo_documentos.id_programa', '=', 'origen.id_programa')
            ->join('programas as destino', 'flujo_documentos.id_programa', '=', 'destino.id_programa')
            ->get();
    }
}
