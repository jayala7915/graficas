<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenSeccionMedia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo_id', 'imagen'];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}