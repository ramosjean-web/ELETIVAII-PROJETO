<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adicionais</title>

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

    <h2>Adicionais</h2>

    <a href="/adicionais/create"
       class="btn btn-success mb-3">
        Novo Adicional
    </a>

    <table class="table table-hover table-striped">

        <thead>

            <tr>
                <th>ID</th>
                <th>Ingrediente</th>
                <th>Preço Extra</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

        @foreach($adicionais as $adicional)

            <tr>

                <td>
                    {{ $adicional->id }}
                </td>

                <td>
                    {{ $adicional->ingrediente->nome }}
                </td>

                <td>
                    R$ {{ number_format($adicional->preco_extra, 2, ',', '.') }}
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/adicionais/{{ $adicional->id }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/adicionais/{{ $adicional->id }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/adicionais/{{ $adicional->id }}"
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