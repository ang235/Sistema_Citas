@extends('layouts.app')

@section('header_buttons')
    @auth
        <a href="{{ route('admin.panel') }}" class="btn">Panel Citas</a>
    @else
        <a href="{{ route('login') }}" class="btn">iniciar sesion</a>
    @endauth
@endsection

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 75vh; text-align: center; max-width: 900px; margin: 0 auto; padding: 20px;">
    <div style="margin-bottom: 30px;">
        <h2 style="font-size: 3rem; margin-bottom: 15px; font-weight: bold;">Cuidado Nutricional Personalizado para tu Salud y Bienestar</h2>
        <p style="font-size: 1.25rem; line-height: 1.6; margin-bottom: 20px;">
            Bienvenido al portal de atención nutricional de <strong>Nutriólogo El Misifu</strong>. Aquí podrás solicitar tu cita de valoración de forma rápida, sencilla y sin complicaciones.
        </p>
        <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 25px;">
            Nuestro objetivo es brindarte un acompañamiento integral basado en hábitos sostenibles, diseñando planes de alimentación adaptados a tu estilo de vida, metas de salud y necesidades específicas.
        </p>
        <div style="background-color: var(--bg-sidebar); border: 2px solid var(--border-color); border-radius: 15px; padding: 20px; text-align: left; display: inline-block;">
            <h3 style="margin-bottom: 10px; font-size: 1.3rem;">¿Cómo funciona?</h3>
            <ol style="margin-left: 20px; line-height: 1.6;">
                <li>Haz clic en el botón <strong>Registrar</strong>.</li>
                <li>Completa tus datos personales y selecciona la fecha de tu consulta.</li>
                <li>Recibirás la confirmación de tu cita para comenzar tu camino hacia una mejor calidad de vida.</li>
            </ol>
        </div>
    </div>

    <a href="{{ route('cita.solicitar') }}" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.5rem;">registrar</a>
</div>
@endsection