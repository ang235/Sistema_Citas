<?php

namespace App\Services;

use App\Models\Cita;
use App\Models\Cliente;

class CitaService
{
    public function registrarSolicitud(array $datos)
    {
        $cliente = Cliente::firstOrCreate(
            ['correo_electronico' => $datos['correo_electronico']],
            [
                'nombre_completo' => $datos['nombre_completo'],
                'edad' => $datos['edad'] ?? null,
                'direccion' => $datos['direccion'] ?? null,
            ]
        );

        return Cita::create([
            'cliente_id' => $cliente->id,
            'fecha_cita' => $datos['fecha_cita'],
            'estado' => 'pendiente',
        ]);
    }

    public function cambiarEstadoMasivo(array $citaIds, string $nuevoEstado)
    {
        return Cita::whereIn('id', $citaIds)->update(['estado' => $nuevoEstado]);
    }

    public function guardarDiagnosticoYReceta(int $citaId, array $datos)
    {
        $cita = Cita::findOrFail($citaId);
        
        $cita->cliente->update([
            'nombre_completo' => $datos['nombre_completo'],
            'edad' => $datos['edad'],
            'peso' => $datos['peso'],
            'altura' => $datos['altura'],
        ]);

        $cita->update([
            'sintomas' => $datos['sintomas_diagnostico'],
            'diagnostico' => $datos['sintomas_diagnostico'],
            'receta' => $datos['receta'] ?? $datos['sintomas_diagnostico'],
            'estado' => 'atendida'
        ]);

        return $cita;
    }
}