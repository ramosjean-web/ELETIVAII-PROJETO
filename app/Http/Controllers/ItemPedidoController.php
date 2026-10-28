<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
    public function index()
    {
        $itens = ItemPedido::with([
            'pedido',
            'produto'
        ])->get();

        return view('itens_pedidos.index', compact('itens'));
    }

    public function create()
    {
        $pedidos = Pedido::all();

        $produtos = Produtos::all();

        return view(
            'itens_pedidos.create',
            compact('pedidos', 'produtos')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1',
            'observacao' => 'nullable|max:255',
            'preco_vendido' => 'required|numeric|min:0',
            'pedidos_id' => 'required|exists:pedidos,id',
            'produtos_id' => 'required|exists:produtos,id'
        ]);

        $subtotal = $request->quantidade * $request->preco_vendido;

        ItemPedido::create([
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
            'subtotal' => $subtotal,
            'preco_vendido' => $request->preco_vendido,
            'pedidos_id' => $request->pedidos_id,
            'produtos_id' => $request->produtos_id
        ]);

        return redirect()
            ->route('itens-pedidos.index')
            ->with('mensagem', 'Item cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $item = ItemPedido::with([
            'pedido',
            'produto'
        ])->findOrFail($id);

        return view('itens_pedidos.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = ItemPedido::findOrFail($id);

        $pedidos = Pedido::all();

        $produtos = Produtos::all();

        return view(
            'itens_pedidos.edit',
            compact('item', 'pedidos', 'produtos')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1',
            'observacao' => 'nullable|max:255',
            'preco_vendido' => 'required|numeric|min:0',
            'pedidos_id' => 'required|exists:pedidos,id',
            'produtos_id' => 'required|exists:produtos,id'
        ]);

        $item = ItemPedido::findOrFail($id);

        $subtotal = $request->quantidade * $request->preco_vendido;

        $item->update([
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
            'subtotal' => $subtotal,
            'preco_vendido' => $request->preco_vendido,
            'pedidos_id' => $request->pedidos_id,
            'produtos_id' => $request->produtos_id
        ]);

        return redirect()
            ->route('itens-pedidos.index')
            ->with('mensagem', 'Item atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $item = ItemPedido::findOrFail($id);

        $item->delete();

        return redirect()
            ->route('itens-pedidos.index')
            ->with('mensagem', 'Item excluído com sucesso!');
    }
}