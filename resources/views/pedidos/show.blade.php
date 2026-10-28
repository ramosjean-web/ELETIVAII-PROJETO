<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Pedido #{{ $pedido->id }}</h2>

    <p>
        <strong>Data/Hora:</strong>
        {{ $pedido->data_hora }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $pedido->status }}
    </p>

    <p>
        <strong>Cliente:</strong>

        @if($pedido->cliente)
            {{ $pedido->cliente->usuario->nome }}
            {{ $pedido->cliente->usuario->sobrenome }}
        @else
            Não informado
        @endif
    </p>

    <p>
        <strong>Funcionário:</strong>

        @if($pedido->funcionario)
            {{ $pedido->funcionario->usuario->nome }}
            {{ $pedido->funcionario->usuario->sobrenome }}
        @else
            Não informado
        @endif
    </p>

    <p>
        <strong>Pagamento:</strong>

        @if($pedido->tipo_pagamento == 1)
            Dinheiro
        @elseif($pedido->tipo_pagamento == 2)
            Cartão
        @elseif($pedido->tipo_pagamento == 3)
            PIX
        @else
            Não informado
        @endif
    </p>

    <p>
        <strong>Recebimento:</strong>

        {{ $pedido->tipo_recebimento == 1 ? 'Local' : 'Entrega' }}
    </p>

    <p>
        <strong>Mesa:</strong>
        {{ $pedido->numero_mesa ?? '-' }}
    </p>

    <p>
        <strong>Taxa de Entrega:</strong>
        R$ {{ number_format($pedido->taxa_entrega ?? 0, 2, ',', '.') }}
    </p>

    <p>
        <strong>Total:</strong>
        R$ {{ number_format($pedido->total, 2, ',', '.') }}
    </p>

    <a href="/pedidos"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>