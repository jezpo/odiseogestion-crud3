<?php

namespace Modules\Hermes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programs extends Model
{
    use HasFactory;
    protected $table = 'programas';
    protected $primaryKey = 'id_programa';
    public $incrementing = false;
    public $timestamps = false;
    protected $casts = [
        'id_programa' => 'string',
    ];
    
    protected $fillable = [
        'id_programa',
        'programa',
        'id_padre',
        'estado'
    ];
    public function documentos()
    {
        return $this->hasMany(Documentos::class, 'id_programa');
    }
    public function flujoTramites()
    {
        return $this->hasMany(FlujoTramite::class,);
    }
    public function flujoDocumentos()
    {
        return $this->hasMany(FlujoDocumentos::class);
    }
    public function getProgramaNombre()
    {
        return $this->programa ? $this->programa->programa : null;
    }
}
