<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with('usuario')->get();

        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('funcionarios.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'eh_admin' => 'required|in:0,1',
            'usuarios_id' => 'required|exists:usuarios,id'
        ]);

        Funcionario::create([
            'eh_admin' => $request->eh_admin,
            'usuarios_id' => $request->usuarios_id
        ]);

        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário cadastrado com sucesso!');
    }

    public function show(string $registro)
    {
        $funcionario = Funcionario::with('usuario')
            ->findOrFail($registro);

        return view('funcionarios.show', compact('funcionario'));
    }

    public function edit(string $registro)
    {
        $funcionario = Funcionario::findOrFail($registro);

        $usuarios = Usuario::all();

        return view(
            'funcionarios.edit',
            compact('funcionario', 'usuarios')
        );
    }

    public function update(Request $request, string $registro)
    {
        $request->validate([
            'eh_admin' => 'required|in:0,1',
            'usuarios_id' => 'required|exists:usuarios,id'
        ]);

        $funcionario = Funcionario::findOrFail($registro);

        $funcionario->update([
            'eh_admin' => $request->eh_admin,
            'usuarios_id' => $request->usuarios_id
        ]);

        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(string $registro)
    {
        $funcionario = Funcionario::findOrFail($registro);

        $funcionario->delete();

        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário excluído com sucesso!');
    }
}