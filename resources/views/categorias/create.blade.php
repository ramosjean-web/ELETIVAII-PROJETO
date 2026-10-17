<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nova Categoria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h1>Nova Categoria</h1>

    <form method="POST"
          action="/categoria"
          data-confirmar="incluir">

        @csrf

        <div class="mb-3">

            <label for="nome" class="form-label">
                Nome da Categoria
            </label>

            <input type="text"
                   id="nome"
                   name="nome"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">
            Cadastrar
        </button>

        <a href="/categoria"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

<script src="{{ asset('js/confirmacoes.js') }}"></script>

</body>
</html>