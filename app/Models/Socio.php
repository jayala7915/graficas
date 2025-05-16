<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $fillable = [
        'socio',
        'telefono',
        'correo',
        'ubicacion',
        'pagina_web',
        'imagen'
    ];
}