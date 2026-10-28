<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Cliente</h2>

    <div class="mb-3">
        <label class="form-label">ID</label>

        <input type="text"
               class="form-control"
               value="{{ $cliente->id }}"
               readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Nome</label>

        <input type="text"
               class="form-control"
               value="{{ $cliente->usuario->nome }} {{ $cliente->usuario->sobrenome }}"
               readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>

        <input type="text"
               class="form-control"
               value="{{ $cliente->email }}"
               readonly>
    </div>

    <a href="/clientes"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>