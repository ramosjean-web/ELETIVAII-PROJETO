<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Novo Ingrediente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Novo Ingrediente</h2>

    <form action="/ingrediente" method="POST">

        @csrf

        <div class="mb-3">

            <label for="nome" class="form-label">
                Nome
            </label>

            <input type="text"
                   class="form-control"
                   id="nome"
                   name="nome"
                   maxlength="45"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">
            Salvar
        </button>

        <a href="/ingrediente"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>