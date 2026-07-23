<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

        $table->foreignId('cliente_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('marca');
        $table->string('modelo');
        $table->string('placa')->unique();
        $table->integer('anio');
        $table->string('color');

        $table->timestamps();
    });
    }
};