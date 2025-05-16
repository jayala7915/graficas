<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'titulo_id',
        'texto',
        'imagen',
        'ruta',
        'texto_amplio_html',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function titulo()
    {
        return $this->belongsTo(\App\Models\Titulo::class);
    }
}