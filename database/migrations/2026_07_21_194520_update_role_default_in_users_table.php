<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Actualiza los usuarios que ya tengan 'cliente' a 'empleado'
        DB::table('users')->where('role', 'cliente')->update(['role' => 'empleado']);

        // Cambia el valor por defecto de la columna para futuros registros
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('empleado')->change();
        });
    }

    public function down(): void
    {
        DB::table('users')->where('role', 'empleado')->update(['role' => 'cliente']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('cliente')->change();
        });
    }
};