<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaDocumentacion extends Model
{
    use HasFactory;

    protected $table = 'cargadocumentacion';
    protected $fillable = ['documento', 'nombre_documento'];
}
