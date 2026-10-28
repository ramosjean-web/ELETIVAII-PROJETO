<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use App\Models\Cliente;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function index()
    {
        $telefones = Telefone::with('cliente.usuario')->get();

        return view('telefones.index', compact('telefones'));
    }

    public function create()
    {
        $clientes = Cliente::with('usuario')->get();

        return view('telefones.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'telefone' => 'required|max:45',
            'clientes_id' => 'required|exists:clientes,id'
        ]);

        Telefone::create([
            'telefone' => $request->telefone,
            'clientes_id' => $request->clientes_id
        ]);

        return redirect()
            ->route('telefones.index')
            ->with('mensagem', 'Telefone cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $telefone = Telefone::with('cliente.usuario')
            ->findOrFail($id);

        return view('telefones.show', compact('telefone'));
    }

    public function edit(string $id)
    {
        $telefone = Telefone::findOrFail($id);

        $clientes = Cliente::with('usuario')->get();

        return view(
            'telefones.edit',
            compact('telefone', 'clientes')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'telefone' => 'required|max:45',
            'clientes_id' => 'required|exists:clientes,id'
        ]);

        $telefone = Telefone::findOrFail($id);

        $telefone->update([
            'telefone' => $request->telefone,
            'clientes_id' => $request->clientes_id
        ]);

        return redirect()
            ->route('telefones.index')
            ->with('mensagem', 'Telefone atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $telefone = Telefone::findOrFail($id);

        $telefone->delete();

        return redirect()
            ->route('telefones.index')
            ->with('mensagem', 'Telefone excluído com sucesso!');
    }
}