<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('pais_nacimiento');
            $table->string('ciudad_nacimiento');
            $table->integer('estado')->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
