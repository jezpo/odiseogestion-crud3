<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FlujoDocumentos extends Model
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
        return $this->belongsTo(Documentos::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class);
    }
    public static function list_documents_with_flow()
    {
        $flujoDocumentos = FlujoDocuments::select(
            'flujo_documentos.id',
            'flujo_documentos.id_documento',
            'flujo_documentos.fecha_recepcion',
            'flujo_documentos.fecha_envio',
            'flujo_documentos.id_programa',
            'flujo_documentos.obs',
            'programas.programa',
            DB::raw("CASE WHEN programas.programa = 'SIS' THEN 'origen' ELSE 'destino' END AS tipo")
        )
        ->join('documentos', 'flujo_documentos.id_documento', '=', 'documentos.id')
        ->join('programas', 'flujo_documentos.id_programa', '=', 'programas.id_programa')
        ->get();
    }
   
}
