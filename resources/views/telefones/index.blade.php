<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Telefones</title>

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

    <h2>Telefones</h2>

    <a href="/telefones/create"
       class="btn btn-success mb-3">
        Novo Telefone
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($telefones as $telefone)

            <tr>

                <td>{{ $telefone->id }}</td>

                <td>
                    {{ $telefone->cliente->usuario->nome }}
                    {{ $telefone->cliente->usuario->sobrenome }}
                </td>

                <td>{{ $telefone->telefone }}</td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/telefones/{{ $telefone->id }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/telefones/{{ $telefone->id }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/telefones/{{ $telefone->id }}"
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