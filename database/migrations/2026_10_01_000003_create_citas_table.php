<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('nutriologo_id')->nullable()->constrained('nutriologos')->onDelete('set null');
            $table->dateTime('fecha_cita');
            $table->enum('estado', ['pendiente', 'aceptada', 'denegada', 'atendida'])->default('pendiente');
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('receta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
