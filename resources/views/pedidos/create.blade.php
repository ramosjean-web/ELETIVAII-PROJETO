<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Novo Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Novo Pedido</h2>

    <form action="/pedidos" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Data e Hora</label>

            <input type="datetime-local"
                   name="data_hora"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>

            <select name="status"
                    class="form-select"
                    required>

                <option value="">Selecione</option>
                <option value="Pendente">Pendente</option>
                <option value="Em preparo">Em preparo</option>
                <option value="Pronto">Pronto</option>
                <option value="Finalizado">Finalizado</option>

            </select>
        </div>

        <div class="mb-3">

            <label class="form-label">
                Cliente
            </label>

            <select name="clientes_id"
                    class="form-select">

                <option value="">Sem cliente</option>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}">

                        {{ $cliente->usuario->nome }}
                        {{ $cliente->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Funcionário
            </label>

            <select name="funcionarios_registro"
                    class="form-select">

                <option value="">
                    Selecione
                </option>

                @foreach($funcionarios as $funcionario)

                    <option value="{{ $funcionario->registro }}">

                        {{ $funcionario->usuario->nome }}
                        {{ $funcionario->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Forma de Pagamento
            </label>

            <select name="tipo_pagamento"
                    class="form-select"
                    required>

                <option value="">Selecione</option>
                <option value="1">Dinheiro</option>
                <option value="2">Cartão</option>
                <option value="3">PIX</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Tipo de Recebimento
            </label>

            <select name="tipo_recebimento"
                    class="form-select"
                    required>

                <option value="">Selecione</option>
                <option value="1">Local</option>
                <option value="2">Entrega</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Número da Mesa
            </label>

            <input type="number"
                   name="numero_mesa"
                   class="form-control"
                   min="1">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Taxa de Entrega
            </label>

            <input type="number"
                   name="taxa_entrega"
                   class="form-control"
                   min="0"
                   step="0.01">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Total
            </label>

            <input type="number"
                   name="total"
                   class="form-control"
                   min="0"
                   step="0.01"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">
            Salvar
        </button>

        <a href="/pedidos"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>