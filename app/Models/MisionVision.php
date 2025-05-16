<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisionVision extends Model
{
    use HasFactory;

    protected $fillable = ['titulo_id', 'imagen', 'texto'];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}