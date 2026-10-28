<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Itens dos Pedidos</title>

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

    <h2>Itens dos Pedidos</h2>

    <a href="/itens-pedidos/create"
       class="btn btn-success mb-3">
        Novo Item
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($itens as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td>
                    Pedido #{{ $item->pedido->id }}
                </td>

                <td>
                    {{ $item->produto->nome }}
                </td>

                <td>
                    {{ $item->quantidade }}
                </td>

                <td>
                    R$ {{ number_format($item->preco_vendido, 2, ',', '.') }}
                </td>

                <td>
                    R$ {{ number_format($item->subtotal, 2, ',', '.') }}
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/itens-pedidos/{{ $item->id }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/itens-pedidos/{{ $item->id }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/itens-pedidos/{{ $item->id }}"
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