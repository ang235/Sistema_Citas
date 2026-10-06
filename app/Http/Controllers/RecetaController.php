<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CitaService;
use App\Models\Cita;

class RecetaController extends Controller
{
    protected $citaService;

    public function __construct(CitaService $citaService)
    {
        $this->citaService = $citaService;
    }

    public function guardarYGenerar(Request $request, $citaId)
    {
        $datos = $request->validate([
            'nombre_completo' => 'required|string',
            'edad' => 'required|integer',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'sintomas_diagnostico' => 'required|string',
        ]);

        $cita = $this->citaService->guardarDiagnosticoYReceta($citaId, $datos);

        return redirect()->route('admin.imprimir', $cita->id);
    }

    public function vistaImpresion($citaId)
    {
        $cita = Cita::with(['cliente', 'nutriologo'])->findOrFail($citaId);
        return view('admin.imprimir_receta', compact('cita'));
    }
}