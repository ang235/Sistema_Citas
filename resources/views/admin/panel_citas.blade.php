@extends('layouts.app')

@section('header_buttons')
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn">Cerrar Sesión</button>
    </form>
@endsection

@section('content')
<div class="layout-container">
    <!-- Sidebar con Citas y Control Masivo -->
    <div class="sidebar">
        <!-- Formulario Carga Masiva -->
        <form action="{{ route('admin.citas.masivo') }}" method="POST" id="form-masivo">
            @csrf
            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                <button type="submit" name="accion" value="aceptada" class="btn" style="font-size: 0.8rem; padding: 5px 10px;">Aceptar Selección</button>
                <button type="submit" name="accion" value="denegada" class="btn" style="font-size: 0.8rem; padding: 5px 10px;">Denegar Selección</button>
            </div>

            @foreach($citas as $cita)
                <div class="card-box" style="display: flex; justify-content: space-between; align-items: center; padding: 12px;">
                    <div>
                        <input type="checkbox" name="citas[]" value="{{ $cita->id }}">
                        <a href="{{ route('admin.panel', ['cita_id' => $cita->id]) }}" style="text-decoration: none; color: inherit; margin-left: 5px; font-weight: bold;">
                            Cita: {{ $cita->cliente->nombre_completo }}
                        </a>
                        <br>
                        <small style="margin-left: 20px;">Estado: {{ $cita->estado }}</small>
                    </div>
                    
                    <div style="display: flex; gap: 5px;">
                        <a href="{{ route('admin.cita.estado', ['id' => $cita->id, 'estado' => 'aceptada']) }}" class="btn" style="padding: 2px 6px; font-size: 0.75rem;">aceptar</a>
                        <a href="{{ route('admin.cita.estado', ['id' => $cita->id, 'estado' => 'denegada']) }}" class="btn" style="padding: 2px 6px; font-size: 0.75rem;">denegar</a>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <!-- Main Content: Captura Individual y Receta -->
    <div class="main-content">
        @if($citaSeleccionada)
            <form action="{{ route('admin.receta.guardar', $citaSeleccionada->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>nombre completo</label>
                    <input type="text" name="nombre_completo" class="form-control" value="{{ $citaSeleccionada->cliente->nombre_completo }}" required>
                </div>

                <div class="form-group">
                    <label>edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ $citaSeleccionada->cliente->edad }}" required>
                </div>

                <div class="form-group">
                    <label>peso (kg)</label>
                    <input type="text" name="peso" class="form-control" value="{{ $citaSeleccionada->cliente->peso }}" required>
                </div>

                <div class="form-group">
                    <label>altura (m)</label>
                    <input type="text" name="altura" class="form-control" value="{{ $citaSeleccionada->cliente->altura }}" required>
                </div>

                <div class="form-group">
                    <label>bloque para escribir sintomas y lo que se le esta recetando</label>
                    <textarea name="sintomas_diagnostico" class="form-control" required>{{ $citaSeleccionada->sintomas ?? $citaSeleccionada->diagnostico }}</textarea>
                </div>

                <div style="margin-top: 30px;">
                    <button type="submit" class="btn">imprimir receta</button>
                </div>
            </form>
        @else
            <p>No hay citas seleccionadas o disponibles.</p>
        @endif
    </div>
</div>
@endsection