<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::with('cliente.usuario')->get();

        return view('enderecos.index', compact('enderecos'));
    }

    public function create()
    {
        $clientes = Cliente::with('usuario')->get();

        return view('enderecos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:20',
            'bairro' => 'required|max:255',
            'cep' => 'required|max:9',
            'cidade' => 'required|max:255',
            'uf' => 'required|size:2',
            'clientes_id' => 'required|exists:clientes,id'
        ]);

        Endereco::create($request->only([
            'logradouro',
            'numero',
            'bairro',
            'cep',
            'cidade',
            'uf',
            'clientes_id'
        ]));

        return redirect()
            ->route('enderecos.index')
            ->with('mensagem', 'Endereço cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $endereco = Endereco::with('cliente.usuario')
            ->findOrFail($id);

        return view('enderecos.show', compact('endereco'));
    }

    public function edit(string $id)
    {
        $endereco = Endereco::findOrFail($id);

        $clientes = Cliente::with('usuario')->get();

        return view(
            'enderecos.edit',
            compact('endereco', 'clientes')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:20',
            'bairro' => 'required|max:255',
            'cep' => 'required|max:9',
            'cidade' => 'required|max:255',
            'uf' => 'required|size:2',
            'clientes_id' => 'required|exists:clientes,id'
        ]);

        $endereco = Endereco::findOrFail($id);

        $endereco->update($request->only([
            'logradouro',
            'numero',
            'bairro',
            'cep',
            'cidade',
            'uf',
            'clientes_id'
        ]));

        return redirect()
            ->route('enderecos.index')
            ->with('mensagem', 'Endereço atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $endereco = Endereco::findOrFail($id);

        $endereco->delete();

        return redirect()
            ->route('enderecos.index')
            ->with('mensagem', 'Endereço excluído com sucesso!');
    }
}