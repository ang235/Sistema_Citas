<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cliente_id',
        'nutriologo_id',
        'fecha_cita',
        'estado',
        'sintomas',
        'diagnostico',
        'receta',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function nutriologo()
    {
        return $this->belongsTo(Nutriologo::class);
    }
}