<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_id',
        'imagen',
        'texto_enriquesido_html',
        'url'
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}