<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedidos</title>

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

    <h2>Pedidos</h2>

    <a href="/pedidos/create"
       class="btn btn-success mb-3">
        Novo Pedido
    </a>

    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Data/Hora</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($pedidos as $pedido)

            <tr>

                <td>{{ $pedido->id }}</td>

                <td>{{ $pedido->data_hora }}</td>

                <td>
                    @if($pedido->cliente)
                        {{ $pedido->cliente->usuario->nome }}
                        {{ $pedido->cliente->usuario->sobrenome }}
                    @else
                        -
                    @endif
                </td>

                <td>{{ $pedido->status }}</td>

                <td>
                    R$ {{ number_format($pedido->total, 2, ',', '.') }}
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="/pedidos/{{ $pedido->id }}"
                           class="btn btn-sm btn-info">
                            Consultar
                        </a>

                        <a href="/pedidos/{{ $pedido->id }}/edit"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="/pedidos/{{ $pedido->id }}"
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