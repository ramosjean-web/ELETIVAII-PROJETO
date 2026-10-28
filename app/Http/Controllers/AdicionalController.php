<?php

namespace App\Http\Controllers;

use App\Models\Adicional;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    public function index()
    {
        $adicionais = Adicional::with('ingrediente')->get();

        return view(
            'adicionais.index',
            compact('adicionais')
        );
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();

        return view(
            'adicionais.create',
            compact('ingredientes')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'preco_extra' => 'required|numeric|min:0',
            'ingredientes_id' => 'required|exists:ingredientes,id'
        ]);

        Adicional::create([
            'preco_extra' => $request->preco_extra,
            'ingredientes_id' => $request->ingredientes_id
        ]);

        return redirect()
            ->route('adicionais.index')
            ->with('mensagem', 'Adicional cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $adicional = Adicional::with('ingrediente')
            ->findOrFail($id);

        return view(
            'adicionais.show',
            compact('adicional')
        );
    }

    public function edit(string $id)
    {
        $adicional = Adicional::findOrFail($id);

        $ingredientes = Ingrediente::all();

        return view(
            'adicionais.edit',
            compact('adicional', 'ingredientes')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'preco_extra' => 'required|numeric|min:0',
            'ingredientes_id' => 'required|exists:ingredientes,id'
        ]);

        $adicional = Adicional::findOrFail($id);

        $adicional->update([
            'preco_extra' => $request->preco_extra,
            'ingredientes_id' => $request->ingredientes_id
        ]);

        return redirect()
            ->route('adicionais.index')
            ->with('mensagem', 'Adicional atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $adicional = Adicional::findOrFail($id);

        $adicional->delete();

        return redirect()
            ->route('adicionais.index')
            ->with('mensagem', 'Adicional excluído com sucesso!');
    }
}