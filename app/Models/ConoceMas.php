<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConoceMas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_id',
        'imagen',
        'texto_corto',
        'texto_largo', // Campo para contenido HTML
        'ruta'
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}