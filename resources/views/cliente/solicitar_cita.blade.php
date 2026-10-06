@extends('layouts.app')

@section('header_buttons')
    <a href="{{ route('inicio') }}" class="btn">volver</a>
@endsection

@section('content')
<div class="layout-container">
    <div class="sidebar" style="width: 35%; padding: 25px;">
        <h3 style="font-size: 1.8rem; margin-bottom: 20px; text-align: center;">¿Por qué es importante acudir con un Nutriólogo?</h3>
        <p style="font-size: 1rem; line-height: 1.5; margin-bottom: 15px;">
            La alimentación no se trata solo de contar calorías, sino de nutrir tu cuerpo de manera consciente y equilibrada. Acudir con un profesional de la nutrición te permite:
        </p>
        <ul style="margin-left: 18px; line-height: 1.5; display: flex; flex-direction: column; gap: 12px; font-size: 0.95rem;">
            <li><strong>Prevención de Enfermedades:</strong> Ayuda a prevenir y controlar padecimientos como diabetes, hipertensión y problemas digestivos.</li>
            <li><strong>Educación Nutricional:</strong> Aprenderás a tomar decisiones informadas sobre tus alimentos diarios sin dietas extremas.</li>
            <li><strong>Atención Individualizada:</strong> Creamos una estrategia 100% adaptada a tu composición corporal y estilo de vida.</li>
            <li><strong>Rendimiento y Vitalidad:</strong> Optimizarás tus niveles de energía diarios y rendimiento físico.</li>
        </ul>
        <p style="font-size: 1rem; font-style: italic; margin-top: 20px; text-align: center; font-weight: bold;">
            Dar el primer paso hacia una vida más saludable empieza con una decisión.
        </p>
    </div>

    <div class="main-content" style="width: 65%;">
        <form action="{{ route('cita.guardar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>correo electronico</label>
                <input type="email" name="correo_electronico" class="form-control" required>
            </div>

            <div class="form-group">
                <label>nombre completo</label>
                <input type="text" name="nombre_completo" class="form-control" required>
            </div>

            <div class="form-group">
                <label>edad</label>
                <input type="number" name="edad" class="form-control">
            </div>

            <div class="form-group">
                <label>fecha de tu cita</label>
                <input type="datetime-local" name="fecha_cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label>direccion</label>
                <input type="text" name="direccion" class="form-control">
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <button type="submit" class="btn" style="padding: 10px 40px;">Solicitar cita</button>
            </div>
        </form>
    </div>
</div>
@endsection