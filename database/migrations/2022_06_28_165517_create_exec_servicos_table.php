<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pet;
use App\Models\Servico;
use App\Models\Funcionario;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exec_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pet::class);
            $table->foreignIdFor(Servico::class);
            $table->foreignIdFor(Funcionario::class);
            $table->decimal("valor", $precision = 30, $scale = 6);
            $table->timestamps();
            $table->foreign("pet_id")->references("id")->on("pet");
            $table->foreign("servico_id")->references("id")->on("servico");
            $table->foreign("funcionario_id")->references("id")->on("funcionario");
        });
    }

    public function down()
    {
        Schema::dropIfExists('exec_servico');
    }
};
