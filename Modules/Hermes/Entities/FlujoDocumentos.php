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
        return $this->belongsTo(Documentos::class, 'id_documento');
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class, 'id_programa');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id_programa) {
                $model->id_programa = 'SIS';
            }
        });
    }
}
