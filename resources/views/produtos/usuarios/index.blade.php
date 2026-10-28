<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuários</title>

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

    <h2>Usuários</h2>

    <a href="/usuarios/create"
       class="btn btn-success mb-3">
        Novo Usuário
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @foreach($usuarios as $usuario)

                <tr>

                    <td>{{ $usuario->id }}</td>

                    <td>{{ $usuario->nome }}</td>

                    <td>{{ $usuario->sobrenome }}</td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="/usuarios/{{ $usuario->id }}"
                               class="btn btn-sm btn-info">
                                Consultar
                            </a>

                            <a href="/usuarios/{{ $usuario->id }}/edit"
                               class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="/usuarios/{{ $usuario->id }}"
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