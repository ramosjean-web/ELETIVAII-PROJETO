<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Item do Pedido</h2>

    <form action="/itens-pedidos/{{ $item->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Pedido
            </label>

            <select name="pedidos_id"
                    class="form-select"
                    required>

                @foreach($pedidos as $pedido)

                    <option value="{{ $pedido->id }}"
                        {{ $item->pedidos_id == $pedido->id ? 'selected' : '' }}>

                        Pedido #{{ $pedido->id }}
                        - {{ $pedido->status }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Produto
            </label>

            <select name="produtos_id"
                    class="form-select"
                    required>

                @foreach($produtos as $produto)

                    <option value="{{ $produto->id }}"
                        {{ $item->produtos_id == $produto->id ? 'selected' : '' }}>

                        {{ $produto->nome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Quantidade
            </label>

            <input type="number"
                   name="quantidade"
                   class="form-control"
                   min="1"
                   value="{{ $item->quantidade }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Preço Vendido
            </label>

            <input type="number"
                   name="preco_vendido"
                   class="form-control"
                   min="0"
                   step="0.01"
                   value="{{ $item->preco_vendido }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Observação
            </label>

            <textarea name="observacao"
                      class="form-control"
                      maxlength="255"
                      rows="3">{{ $item->observacao }}</textarea>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/itens-pedidos"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>