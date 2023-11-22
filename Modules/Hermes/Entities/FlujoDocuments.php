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
    public static function list_documents_with_flow()
{
    $flujoDocumentos = DB::table('flujo_documentos')
        ->select(
            'flujo_documentos.id',
            'flujo_documentos.id_documento',
            'flujo_documentos.fecha_recepcion',
            'flujo_documentos.fecha_envio',
            'programas.programa as programa',
            'flujo_documentos.obs',
            DB::raw('(SELECT cite FROM documentos WHERE id = flujo_documentos.id_documento) AS cite')
        )
        ->leftJoin('documentos', 'flujo_documentos.id_documento', '=', 'documentos.id')
        ->leftJoin('programas', 'flujo_documentos.id_programa', '=', 'programas.id_programa')
        ->get();

    return $flujoDocumentos;
}
}
