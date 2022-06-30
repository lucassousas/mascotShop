<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\FuncionarioController;

Route::Resources([
    "pet" => PetController::class,
    "produto" => ProdutoController::class,
    "especie" => EspecieController::class,
    "funcionario" => FuncionarioController::class
]);

Route::get('/', function () {
    return view('welcome');
});
