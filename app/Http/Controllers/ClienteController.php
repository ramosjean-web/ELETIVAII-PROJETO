<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('usuario')->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('clientes.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'usuarios_id' => 'required|exists:usuarios,id'
        ]);

        Cliente::create([
            'email' => $request->email,
            'usuarios_id' => $request->usuarios_id
        ]);

        return redirect()
            ->route('clientes.index')
            ->with('mensagem', 'Cliente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $cliente = Cliente::with('usuario')->findOrFail($id);

        return view('clientes.show', compact('cliente'));
    }

    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $usuarios = Usuario::all();

        return view('clientes.edit', compact('cliente', 'usuarios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'usuarios_id' => 'required|exists:usuarios,id'
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'email' => $request->email,
            'usuarios_id' => $request->usuarios_id
        ]);

        return redirect()
            ->route('clientes.index')
            ->with('mensagem', 'Cliente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('mensagem', 'Cliente excluído com sucesso!');
    }
}