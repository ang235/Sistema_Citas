<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CitaService;
use App\Models\Cita;

class CitaController extends Controller
{
    protected $citaService;

    public function __construct(CitaService $citaService)
    {
        $this->citaService = $citaService;
    }

    public function inicio()
    {
        return view('cliente.inicio');
    }

    public function formularioSolicitar()
    {
        return view('cliente.solicitar_cita');
    }

    public function guardarSolicitud(Request $request)
    {
        $datos = $request->validate([
            'correo_electronico' => 'required|email',
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'nullable|integer',
            'fecha_cita' => 'required|date',
            'direccion' => 'nullable|string',
        ]);

        $this->citaService->registrarSolicitud($datos);

        return redirect()->route('inicio')->with('exito', 'Su cita ha sido solicitada exitosamente.');
    }

    public function panel(Request $request)
    {
        $citas = Cita::with('cliente')->orderBy('created_at', 'desc')->get();
        
        $citaSeleccionada = null;
        if ($request->has('cita_id')) {
            $citaSeleccionada = Cita::with('cliente')->find($request->cita_id);
        } else if ($citas->count() > 0) {
            $citaSeleccionada = $citas->first();
        }

        return view('admin.panel_citas', compact('citas', 'citaSeleccionada'));
    }

    public function cambiarEstado(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update(['estado' => $request->estado]);
        return back()->with('exito', 'Estado actualizado.');
    }

    public function cargaMasivaAccion(Request $request)
    {
        $request->validate([
            'citas' => 'required|array',
            'accion' => 'required|in:aceptada,denegada',
        ]);

        $this->citaService->cambiarEstadoMasivo($request->citas, $request->accion);

        return back()->with('exito', 'Procesamiento masivo ejecutado correctamente.');
    }
}