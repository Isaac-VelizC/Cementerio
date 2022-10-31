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
        Schema::create('nichos', function (Blueprint $table) {
            $table->id();
            $table->integer("codigo")->nullable();
            $table->decimal('precio', 5, 2)->default(0.00);
            $table->string("estado")->default('D');
            $table->unsignedBigInteger('pabellon_id');
            $table->foreign('pabellon_id')->references('id')->on('pabellons')->onDelete('cascade');
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
        Schema::dropIfExists('nichos');
    }
};
