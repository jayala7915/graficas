<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_id',
        'imagen',
        'nombre',
        'cargo',
        'texto',
        'texto_descripcion_direc',
        'rango_pagina'
    ];

    // Opciones para el combo de cargos
    public static $cargos = [
        'Director General',
        'Gerente General',
        'Subgerente',
        'Jefe de Departamento',
        'Coordinador',
        'Supervisor',
        'Asesor',
        'Consultor',
        'Analista',
        'Asistente'
    ];

    // Opciones para el combo de rango_pagina
    public static $rangosPagina = [
        'Cabecera',
        'Medio',
        'Carousel'
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}