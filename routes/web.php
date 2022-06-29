<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProdutoController;

Route::Resources([
    "pet" => PetController::class,
    "produto" => ProdutoController::class
]);

Route::get('/', function () {
    return view('welcome');
});
