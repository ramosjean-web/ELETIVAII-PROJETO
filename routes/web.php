<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItemPedidoController;
use App\Http\Controllers\AdicionalController;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('produto', ProdutosController::class);

Route::resource('categoria', CategoriaController::class);


Route::resource('ingredientes', IngredienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('enderecos', EnderecoController::class);
Route::resource('telefones', TelefoneController::class);
Route::resource('pedidos', PedidoController::class);
Route::resource('itens-pedidos', ItemPedidoController::class);
Route::resource('adicionais', AdicionalController::class);