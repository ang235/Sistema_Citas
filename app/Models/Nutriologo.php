<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nutriologo extends Authenticatable
{
    use HasFactory;

    protected $table = 'nutriologos';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}