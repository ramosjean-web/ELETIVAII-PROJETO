<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('produto', ProdutosController::class);

Route::resource('categoria', CategoriaController::class);
//oi