<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Categoria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h1>Consultar Categoria</h1>

    <div class="card">

        <div class="card-body">

            <p>
                <strong>ID:</strong>
                {{ $categoria->id }}
            </p>

            <p>
                <strong>Nome:</strong>
                {{ $categoria->nome }}
            </p>

            <a href="/categoria/{{ $categoria->id }}/edit"
               class="btn btn-warning">
                Editar
            </a>

            <a href="/categoria"
               class="btn btn-secondary">
                Voltar
            </a>

        </div>

    </div>

</div>

</body>
</html>