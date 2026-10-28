<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Novo Endereço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Novo Endereço</h2>

    <form action="/enderecos" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Cliente</label>

            <select name="clientes_id"
                    class="form-select"
                    required>

                <option value="">Selecione um cliente</option>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}">

                        {{ $cliente->usuario->nome }}
                        {{ $cliente->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Logradouro</label>

            <input type="text"
                   name="logradouro"
                   class="form-control"
                   maxlength="255"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número</label>

            <input type="text"
                   name="numero"
                   class="form-control"
                   maxlength="20"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro</label>

            <input type="text"
                   name="bairro"
                   class="form-control"
                   maxlength="255"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">CEP</label>

            <input type="text"
                   name="cep"
                   class="form-control"
                   maxlength="9"
                   placeholder="00000-000"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cidade</label>

            <input type="text"
                   name="cidade"
                   class="form-control"
                   maxlength="255"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">UF</label>

            <input type="text"
                   name="uf"
                   class="form-control"
                   maxlength="2"
                   placeholder="SP"
                   required>
        </div>

        <button type="submit"
                class="btn btn-success">
            Salvar
        </button>

        <a href="/enderecos"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>