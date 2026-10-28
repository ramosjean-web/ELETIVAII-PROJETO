<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Adicional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Adicional</h2>

    <div class="mb-3">

        <label class="form-label">
            ID
        </label>

        <input type="text"
               class="form-control"
               value="{{ $adicional->id }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Ingrediente
        </label>

        <input type="text"
               class="form-control"
               value="{{ $adicional->ingrediente->nome }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Preço Extra
        </label>

        <input type="text"
               class="form-control"
               value="R$ {{ number_format($adicional->preco_extra, 2, ',', '.') }}"
               readonly>

    </div>

    <a href="/adicionais"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>