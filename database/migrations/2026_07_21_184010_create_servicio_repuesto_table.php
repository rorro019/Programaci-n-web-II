<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicio_repuesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->constrained()->onDelete('cascade');
            $table->foreignId('repuesto_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicio_repuesto');
    }
};