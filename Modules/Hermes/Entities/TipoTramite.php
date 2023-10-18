<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoTramite extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'tipo_tramite';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'tramite',
        'estado'
    ];
    
    public function flujotramites()
    {
        return $this->hasMany(FlujoTramite::class);
    } 
}
