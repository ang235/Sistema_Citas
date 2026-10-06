@extends('layouts.app')

@section('header_buttons')
    <a href="{{ route('inicio') }}" class="btn">volver</a>
@endsection

@section('content')
<div style="max-width: 450px; margin: 80px auto;">
    <div class="card-box">
        <h2 style="text-align: center; margin-bottom: 20px;">Iniciar Sesión Nutriólogo</h2>
        
        @if($errors->any())
            <div style="color: red; margin-bottom: 15px;">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 15px;">Ingresar</button>
        </form>
    </div>
</div>
@endsection