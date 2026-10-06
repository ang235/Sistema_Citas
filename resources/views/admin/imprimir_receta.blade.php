<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receta Médica - {{ $cita->cliente->nombre_completo }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Condensed:wght@700&family=Oswald:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Oswald', sans-serif; padding: 40px; color: #000; }
        .header { display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 20px; }
        .title { font-family: 'Libre Caslon Condensed', serif; font-size: 2.5rem; }
        .box { border: 1px solid #000; border-radius: 10px; padding: 15px; margin-top: 20px; }
        .btn-print { margin-bottom: 20px; padding: 10px 20px; cursor: pointer; }
        @media print { .btn-print { display: none; } }
    </style>
</head>
<body>
    <button onclick="window.print()" class="btn-print">Imprimir Documento</button>

    <div class="header">
        <div>
            <div class="title">Nutriólogo El Misifu</div>
            <p>Atendido por: {{ $cita->nutriologo->nombre ?? 'Dr. Misifu' }}</p>
        </div>
        <div style="text-align: right;">
            <p>Fecha: {{ now()->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="box">
        <h3>Datos del Paciente</h3>
        <p><strong>Nombre:</strong> {{ $cita->cliente->nombre_completo }}</p>
        <p><strong>Edad:</strong> {{ $cita->cliente->edad }} años</p>
        <p><strong>Peso:</strong> {{ $cita->cliente->peso }} kg | <strong>Altura:</strong> {{ $cita->cliente->altura }} m</p>
    </div>

    <div class="box" style="min-height: 250px;">
        <h3>Diagnóstico y Prescripción Nutricional</h3>
        <p style="white-space: pre-line; margin-top: 15px;">{{ $cita->receta }}</p>
    </div>
</body>
</html>