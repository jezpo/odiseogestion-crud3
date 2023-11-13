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

    public function obtenerTipoDocumento()
    {
        $documento = Documentos::find($this->id_documento);
        if ($documento) {
            $programa = Programas::where('id_programa', $documento->id_programa)->first();
            if ($programa) {
                if ($programa->estado === 'SIS') {
                    return 'Origen';
                } else {
                    return 'Destino';
                }
            }
        }
        return 'No especificado';
    }
    public static function obtaindocumenttype()
    {
        return DB::table('flujo_documentos')
            ->select(
                'flujo_documentos.id',
                'documentos.cite',
                DB::raw("CASE WHEN origen.estado = 'SIS' THEN 'Origen' ELSE 'Destino' END AS tipo_documento"),
                'origen.programa as programa_origen',
                'destino.programa as programa_destino',
                'flujo_documentos.fecha_recepcion',
                'flujo_documentos.fecha_envio',
                'flujo_documentos.obs'
            )
            ->join('documentos', 'flujo_documentos.id_documento', '=', 'documentos.id')
            ->join('programas as origen', 'flujo_documentos.id_programa', '=', 'origen.id_programa')
            ->join('programas as destino', 'flujo_documentos.id_programa', '=', 'destino.id_programa');
    }

    /*public static function fetchWithDocumentCiteAndProgramName()
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
            ->join('programas as destino', 'flujo_documentos.id_programa', '=', 'destino.id_programa');
    }
*/
    public static function fetchDocumentProgramFlujoData()
    {
        return DB::table('flujo_documentos')
        ->select(
            'flujo_documentos.id', // Asegúrate de seleccionar el campo 'id'
            'documentos.id AS documento_id',
            'documentos.cite AS documento_cite',
            'documentos.descripcion AS documento_descripcion',
            'documentos.estado AS documento_estado',
            'documentos.hash AS documento_hash',
            'documentos.id_tipo_documento AS documento_tipo',
            'programas.id AS programa_id',
            'programas.programa AS programa_nombre',
            'flujo_tramite.id AS flujo_tramite_id',
            'flujo_tramite.id_tipo_tramite AS flujo_tramite_tipo',
            'flujo_tramite.id_programa AS flujo_tramite_programa',
            'flujo_tramite.orden AS flujo_tramite_orden',
            'flujo_tramite.tiempo AS flujo_tramite_tiempo',
            'flujo_tramite.estado AS flujo_tramite_estado',
            DB::raw("CASE WHEN programas.id_programa = 'SIS' THEN 'origen' ELSE 'destino' END AS origen_destino")
        )
        ->join('documentos', 'flujo_documentos.id_documento', '=', 'documentos.id')
        ->join('programas', 'flujo_documentos.id_programa', '=', 'programas.id_programa')
        ->join('flujo_tramite', 'programas.id_programa', '=', 'flujo_tramite.id_programa')
        ->get();
    }
}
