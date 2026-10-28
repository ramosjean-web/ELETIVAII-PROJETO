<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Item do Pedido</h2>

    <p>
        <strong>ID:</strong>
        {{ $item->id }}
    </p>

    <p>
        <strong>Pedido:</strong>
        Pedido #{{ $item->pedido->id }}
    </p>

    <p>
        <strong>Produto:</strong>
        {{ $item->produto->nome }}
    </p>

    <p>
        <strong>Quantidade:</strong>
        {{ $item->quantidade }}
    </p>

    <p>
        <strong>Preço Vendido:</strong>
        R$ {{ number_format($item->preco_vendido, 2, ',', '.') }}
    </p>

    <p>
        <strong>Subtotal:</strong>
        R$ {{ number_format($item->subtotal, 2, ',', '.') }}
    </p>

    <p>
        <strong>Observação:</strong>
        {{ $item->observacao ?? 'Sem observação' }}
    </p>

    <a href="/itens-pedidos"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>