<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nutriologo;
use App\Models\Cliente;
use App\Models\Cita;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1 Usuario Docente (Super Usuario / Nutriólogo Principal)
        $docente = Nutriologo::create([
            'nombre' => 'Dr. Misifu (Docente)',
            'email' => 'docente@misifu.com',
            'password' => Hash::make('password123'),
            'rol' => 'docente',
        ]);

        // 15 Usuarios Alumnos
        for ($i = 1; $i <= 15; $i++) {
            Nutriologo::create([
                'nombre' => "Alumno Nutrición {$i}",
                'email' => "alumno{$i}@misifu.com",
                'password' => Hash::make('password123'),
                'rol' => 'alumno',
            ]);
        }

        // Datos de prueba para Clientes y Citas
        for ($c = 1; $c <= 7; $c++) {
            $cliente = Cliente::create([
                'nombre_completo' => "Cliente Ejemplar {$c}",
                'correo_electronico' => "cliente{$c}@gmail.com",
                'edad' => rand(20, 50),
                'direccion' => "Av. Universidad #{$c}00, Ciudad",
                'peso' => rand(60, 95),
                'altura' => rand(160, 185) / 100,
            ]);

            Cita::create([
                'cliente_id' => $cliente->id,
                'nutriologo_id' => $docente->id,
                'fecha_cita' => now()->addDays($c)->format('Y-m-d H:i:s'),
                'estado' => $c % 2 == 0 ? 'aceptada' : 'pendiente',
                'sintomas' => 'Evaluación nutricional de rutina y control de peso.',
            ]);
        }
    }
}