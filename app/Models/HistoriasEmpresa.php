<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriasEmpresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_id',
        'texto',
        'imagen'
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}