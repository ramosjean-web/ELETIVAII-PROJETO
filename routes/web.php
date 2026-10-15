<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
Route::get('/', function () {
    return view('inicio');
});

Route::resource('produto', ProdutosController::class);
