<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Funcionários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    @if(session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif

    <h2>Funcionários</h2>

    <a href="/funcionarios/create"
       class="btn btn-success mb-3">
        Novo Funcionário
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>Registro</th>
                <th>Nome</th>
                <th>Administrador</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($funcionarios as $funcionario)

            <tr>

                <td>{{ $funcionario->registro }}</td>

                <td>
                    {{ $funcionario->usuario->nome }}
                    {{ $funcionario->usuario->sobrenome }}
                </td>

                <td>
                    {{ $funcionario->eh_admin == 1 ? 'Sim' : 'Não' }}
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/funcionarios/{{ $funcionario->registro }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/funcionarios/{{ $funcionario->registro }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/funcionarios/{{ $funcionario->registro }}"
                              method="POST"
                              data-confirmar="excluir">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger">
                                Excluir
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

<script src="{{ asset('js/confirmacoes.js') }}"></script>

</body>
</html>