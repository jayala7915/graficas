<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    use HasFactory;

    protected $fillable = [
        'socio_id',
        'puesto_oferta',
        'numero_vacantes',
        'tipo_vacante',
        'descripcion_vacante'
    ];

    protected $casts = [
        'tipo_vacante' => 'string',
    ];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
}