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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();

            $table->string('area');
            $table->string('cargo');
            $table->string('rol');
            $table->string('jefe')->nullable();
            $table->integer('estado')->default('1');
            $table->unsignedBigInteger('empleado_id')->nullable();

            $table->foreign('empleado_id')//foreing key 
                    ->references('id')
                    ->on('empleados')
                    ->onDelete('cascade')//borra en carcada
                    ->onUpdate('cascade');//actualiza en cascada, 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
