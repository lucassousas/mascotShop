<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('especie', function (Blueprint $table) {
            $table->id();
            $table->string("especie", 100);
            $table->string("raca", 100);
            $table->string("genero", 25);
            $table->string("linhagem", 100);
            $table->string("definicao", 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('especie');
    }
};
