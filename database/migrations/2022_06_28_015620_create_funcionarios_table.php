<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Funcionario;

return new class extends Migration
{
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->string("cpf", 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
};
