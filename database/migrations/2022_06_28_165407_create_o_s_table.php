<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Funcionario;
use App\Models\Pet;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('os', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Funcionario::class);
            $table->foreignIdFor(Pet::class);
            $table->string("servico", 100);
            $table->timestamps();
            $table->foreign("funcionario_id")->references("id")->on("funcionario");
            $table->foreign("pet_id")->references("id")->on("pet");
        });
    }

    public function down()
    {
        Schema::dropIfExists('os');
    }
};
