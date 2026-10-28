<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Telefone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Telefone</h2>

    <div class="mb-3">

        <label class="form-label">
            ID
        </label>

        <input type="text"
               class="form-control"
               value="{{ $telefone->id }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Cliente
        </label>

        <input type="text"
               class="form-control"
               value="{{ $telefone->cliente->usuario->nome }} {{ $telefone->cliente->usuario->sobrenome }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Telefone
        </label>

        <input type="text"
               class="form-control"
               value="{{ $telefone->telefone }}"
               readonly>

    </div>

    <a href="/telefones"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>