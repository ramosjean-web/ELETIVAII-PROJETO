<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Pedido</h2>

    <form action="/pedidos/{{ $pedido->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">Data e Hora</label>

            <input type="datetime-local"
                   name="data_hora"
                   class="form-control"
                   value="{{ date('Y-m-d\TH:i', strtotime($pedido->data_hora)) }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">Status</label>

            <select name="status"
                    class="form-select"
                    required>

                <option value="Pendente"
                    {{ $pedido->status == 'Pendente' ? 'selected' : '' }}>
                    Pendente
                </option>

                <option value="Em preparo"
                    {{ $pedido->status == 'Em preparo' ? 'selected' : '' }}>
                    Em preparo
                </option>

                <option value="Pronto"
                    {{ $pedido->status == 'Pronto' ? 'selected' : '' }}>
                    Pronto
                </option>

                <option value="Finalizado"
                    {{ $pedido->status == 'Finalizado' ? 'selected' : '' }}>
                    Finalizado
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Cliente</label>

            <select name="clientes_id"
                    class="form-select">

                <option value="">Sem cliente</option>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}"
                        {{ $pedido->clientes_id == $cliente->id ? 'selected' : '' }}>

                        {{ $cliente->usuario->nome }}
                        {{ $cliente->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Funcionário</label>

            <select name="funcionarios_registro"
                    class="form-select">

                <option value="">Sem funcionário</option>

                @foreach($funcionarios as $funcionario)

                    <option value="{{ $funcionario->registro }}"
                        {{ $pedido->funcionarios_registro == $funcionario->registro ? 'selected' : '' }}>

                        {{ $funcionario->usuario->nome }}
                        {{ $funcionario->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Forma de Pagamento</label>

            <select name="tipo_pagamento"
                    class="form-select"
                    required>

                <option value="1"
                    {{ $pedido->tipo_pagamento == 1 ? 'selected' : '' }}>
                    Dinheiro
                </option>

                <option value="2"
                    {{ $pedido->tipo_pagamento == 2 ? 'selected' : '' }}>
                    Cartão
                </option>

                <option value="3"
                    {{ $pedido->tipo_pagamento == 3 ? 'selected' : '' }}>
                    PIX
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Tipo de Recebimento</label>

            <select name="tipo_recebimento"
                    class="form-select"
                    required>

                <option value="1"
                    {{ $pedido->tipo_recebimento == 1 ? 'selected' : '' }}>
                    Local
                </option>

                <option value="2"
                    {{ $pedido->tipo_recebimento == 2 ? 'selected' : '' }}>
                    Entrega
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Número da Mesa</label>

            <input type="number"
                   name="numero_mesa"
                   class="form-control"
                   value="{{ $pedido->numero_mesa }}">

        </div>

        <div class="mb-3">

            <label class="form-label">Taxa de Entrega</label>

            <input type="number"
                   name="taxa_entrega"
                   class="form-control"
                   step="0.01"
                   min="0"
                   value="{{ $pedido->taxa_entrega }}">

        </div>

        <div class="mb-3">

            <label class="form-label">Total</label>

            <input type="number"
                   name="total"
                   class="form-control"
                   step="0.01"
                   min="0"
                   value="{{ $pedido->total }}"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/pedidos"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>