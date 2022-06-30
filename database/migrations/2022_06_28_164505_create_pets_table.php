<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pet;
use App\Models\Especie;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->date("dataNasc");
            $table->integer("idade")->nullable;
            $table->string("sexo", 25);
            $table->foreignIdFor(Especie::class);
            $table->string("dono", 100);
            $table->timestamps();
            $table->foreign("especie_id")->references("id")->on("especie");
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pet');
    }
};