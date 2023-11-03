<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Documentos extends Model
{
    use HasFactory;

    //protected $connection = 'pgsql';
    protected $table = 'documentos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'cite',
        'descripcion',
        'estado',
        'hash',
        'id_tipo_documento',
        'documento',
        'id_programa'

    ];
    public function programas()
    {
        return $this->belongsTo(Programas::class, 'id_programa', 'id_programa');
    }

    public function flujoDocumentos()
    {
        return $this->hasMany(FlujoDocumentos::class);
    }
    public  static function list_documents()
    {
        $query = DB::select('select doc.id,doc.cite,doc.descripcion,doc.estado,doc.id_tipo_documento,doc.id_programa,pr.programa from documentos doc inner join programas pr on doc.id_programa = pr.id_programa ');
        return $query;
    }
    public  static function list_documents2()
    {
        return Documentos::select('documentos.id', 'documentos.cite', 'documentos.descripcion', 'documentos.estado', 'documentos.id_tipo_documento', 'documentos.id_programa', 'programas.programa')
        ->join('programas', 'documentos.id_programa', '=', 'programas.id_programa')
        ->where('programas.programa', '!=', 'CARRERA DE INGENIERIA DE SISTEMAS');
    }
    public static function list_documents1()
    {
        return Documentos::select('documentos.id', 'documentos.cite', 'documentos.descripcion', 'documentos.estado', 'documentos.id_tipo_documento', 'documentos.id_programa', 'programas.programa')
        ->join('programas', 'documentos.id_programa', '=', 'programas.id_programa')
        ->where('programas.programa', '=', 'CARRERA DE INGENIERIA DE SISTEMAS');
    }
}
