<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Venda;
use App\Models\Produto;

return new class extends Migration
{

    public function up()
    {
        Schema::create('item_venda', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Venda::class);
            $table->foreignIdFor(Produto::class);
            $table->decimal("unitario", $precision = 30, $scale = 6);
            $table->integer("qtd");
            $table->foreign("venda_id")->references("id")->on("venda");
            $table->foreign("produto_id")->references("id")->on("produto");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_venda');
    }
};
