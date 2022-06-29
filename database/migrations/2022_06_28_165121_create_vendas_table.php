<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pet;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pet::class);
            $table->decimal("total", $precision = 30, $scale = 6);
            $table->timestamps();
            $table->foreign("pet_id")->references("id")->on("pet");
        });
    }

    public function down()
    {
        Schema::dropIfExists('venda');
    }
};
