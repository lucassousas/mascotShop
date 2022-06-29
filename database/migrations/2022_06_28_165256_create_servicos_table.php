<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Funcionario;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servico', function (Blueprint $table) {
            $table->id();
            $table->string("descricao", 100);
            $table->decimal("valor", $precision = 20, $scale = 6);
            $table->foreignIdFor(Funcionario::class);
            $table->timestamps();
            $table->foreign("funcionario_id")->references("id")->on("funcionario");
        });
    }

    public function down()
    {
        Schema::dropIfExists('servico');
    }
};
