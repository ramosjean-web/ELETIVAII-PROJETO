<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with([
            'cliente.usuario',
            'funcionario.usuario'
        ])->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::with('usuario')->get();

        $funcionarios = Funcionario::with('usuario')->get();

        return view(
            'pedidos.create',
            compact('clientes', 'funcionarios')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_hora' => 'required',
            'status' => 'required|max:45',
            'tipo_pagamento' => 'required|integer',
            'total' => 'required|numeric|min:0',
            'tipo_recebimento' => 'required|integer',
            'numero_mesa' => 'nullable|integer',
            'taxa_entrega' => 'nullable|numeric|min:0',
            'clientes_id' => 'nullable|exists:clientes,id',
            'funcionarios_registro' => 'nullable|exists:funcionarios,registro'
        ]);

        Pedido::create($request->only([
            'data_hora',
            'status',
            'tipo_pagamento',
            'total',
            'tipo_recebimento',
            'numero_mesa',
            'taxa_entrega',
            'clientes_id',
            'funcionarios_registro'
        ]));

        return redirect()
            ->route('pedidos.index')
            ->with('mensagem', 'Pedido cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $pedido = Pedido::with([
            'cliente.usuario',
            'funcionario.usuario'
        ])->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        $pedido = Pedido::findOrFail($id);

        $clientes = Cliente::with('usuario')->get();

        $funcionarios = Funcionario::with('usuario')->get();

        return view(
            'pedidos.edit',
            compact('pedido', 'clientes', 'funcionarios')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'data_hora' => 'required',
            'status' => 'required|max:45',
            'tipo_pagamento' => 'required|integer',
            'total' => 'required|numeric|min:0',
            'tipo_recebimento' => 'required|integer',
            'numero_mesa' => 'nullable|integer',
            'taxa_entrega' => 'nullable|numeric|min:0',
            'clientes_id' => 'nullable|exists:clientes,id',
            'funcionarios_registro' => 'nullable|exists:funcionarios,registro'
        ]);

        $pedido = Pedido::findOrFail($id);

        $pedido->update($request->only([
            'data_hora',
            'status',
            'tipo_pagamento',
            'total',
            'tipo_recebimento',
            'numero_mesa',
            'taxa_entrega',
            'clientes_id',
            'funcionarios_registro'
        ]));

        return redirect()
            ->route('pedidos.index')
            ->with('mensagem', 'Pedido atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->delete();

        return redirect()
            ->route('pedidos.index')
            ->with('mensagem', 'Pedido excluído com sucesso!');
    }
}