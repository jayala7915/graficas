<?php

// app/Models/DatosEmpresa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosEmpresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'correo',
        'direccion_pagina',
        'telefono_fijo',
        'telefono_movil',
        'redes_sociales',
        'logo_empresa',
        'eslogan_empresa'
    ];

    protected $casts = [
        'redes_sociales' => 'array'
    ];

    // Opcional: Accesor para las redes sociales activas
    public function getRedesActivasAttribute()
    {
        if (empty($this->redes_sociales)) {
            return [];
        }

        return array_filter($this->redes_sociales, function($red) {
            return $red['activa'] ?? false;
        });
    }
}