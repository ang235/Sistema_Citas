<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre_completo',
        'correo_electronico',
        'edad',
        'direccion',
        'peso',
        'altura',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}