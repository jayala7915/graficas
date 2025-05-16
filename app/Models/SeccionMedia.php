<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeccionMedia extends Model
{
    protected $table = 'seccion_media';
    
    protected $fillable = [
        'titulo_seccion',
        'texto'
    ];
    
    public static function canCreateMore()
    {
        return self::count() < 3;
    }
}