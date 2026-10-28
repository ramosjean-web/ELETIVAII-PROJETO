<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Ingrediente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Ingrediente</h2>

    <form action="/ingrediente/{{ $ingrediente->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label for="nome"
                   class="form-label">
                Nome
            </label>

            <input type="text"
                   class="form-control"
                   id="nome"
                   name="nome"
                   value="{{ $ingrediente->nome }}"
                   maxlength="45"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/ingrediente"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>