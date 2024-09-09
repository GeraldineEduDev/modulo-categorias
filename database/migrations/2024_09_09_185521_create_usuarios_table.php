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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('documento',10);
            $table->string('email',100)->unique();
            $table->string('telefono',20);
            $table->string('direccion',100);
            $table->string('sexo',20);
            $table->string('password',150);
            $table->string('tipoDocumento',20);
            $table->foreignId('rol_id')->constrained('roles','id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
