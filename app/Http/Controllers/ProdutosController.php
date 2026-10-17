<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Lista todos os produtos.
     */
    public function index()
    {
        $produtos = Produtos::all();

        return view('produtos.index', compact('produtos'));
    }


    /**
     * Exibe o formulário de cadastro.
     */
    public function create()
    {
        return view('produtos.create');
    }


    /**
     * Salva um novo produto.
     */
    public function store(Request $request)
    {
        if (Produtos::create($request->all())) {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Produto adicionado com sucesso!');

        } else {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Erro ao inserir o produto!');
        }
    }


    /**
     * Consulta um produto.
     */
    public function show(string $id)
    {
        $produtos = Produtos::findOrFail($id);

        return view('produtos.show', compact('produtos'));
    }


    /**
     * Exibe o formulário de edição.
     */
    public function edit(string $id)
    {
        $produtos = Produtos::findOrFail($id);

        return view('produtos.edit', compact('produtos'));
    }


    /**
     * Atualiza o produto.
     */
    public function update(Request $request, string $id)
    {
        $produtos = Produtos::findOrFail($id);

        if ($produtos->update($request->all())) {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Produto alterado com sucesso!');

        } else {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Erro ao alterar o produto!');
        }
    }


    /**
     * Exclui o produto.
     */
    public function destroy(string $id)
    {
        $produtos = Produtos::findOrFail($id);

        if ($produtos->delete()) {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Produto excluído com sucesso!');

        } else {

            return redirect()
                ->route('produto.index')
                ->with('mensagem', 'Erro ao excluir o produto!');
        }
    }
}