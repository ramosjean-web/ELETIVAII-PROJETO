<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Endereços</title>

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

    <h2>Endereços</h2>

    <a href="/enderecos/create"
       class="btn btn-success mb-3">
        Novo Endereço
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($enderecos as $endereco)

            <tr>

                <td>{{ $endereco->id }}</td>

                <td>
                    {{ $endereco->cliente->usuario->nome }}
                    {{ $endereco->cliente->usuario->sobrenome }}
                </td>

                <td>{{ $endereco->logradouro }}</td>

                <td>{{ $endereco->numero }}</td>

                <td>{{ $endereco->cidade }}</td>

                <td>{{ $endereco->uf }}</td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/enderecos/{{ $endereco->id }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/enderecos/{{ $endereco->id }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/enderecos/{{ $endereco->id }}"
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