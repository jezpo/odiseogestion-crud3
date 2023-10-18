<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
class Documentos extends Model
{
    use HasFactory;

    protected $table = 'documentos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id', 
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
        return $this->belongsTo(Programas::class);
    }

    public function flujoDocumentos()
    {
        return $this->hasMany(FlujoDocumentos::class);
    }
    public  static function list_documents(){
        $query=DB::select('select doc.id,doc.cite,doc.descripcion,doc.estado,doc.id_tipo_documento,doc.id_programa,pr.programa from documentos doc inner join programas pr on doc.id_programa = pr.id_programa ');
        return $query;
   }
}
