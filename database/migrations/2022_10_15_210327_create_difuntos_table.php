<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difuntos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('difunto_ci')->unique()->nullable();
            $table->unsignedBigInteger('civil_id')->nullable();
            $table->foreign('civil_id')->references('id')->on('estado_civils')->onDelete('cascade');
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->boolean('reserva')->default(false);
            $table->string('causa_muerte')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_muerte')->nullable();
            $table->string('estado')->default('E');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('difuntos');
    }
};
