<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Usuário</h2>

    <form action="/usuarios/{{ $usuario->id }}"
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
                   value="{{ $usuario->nome }}"
                   maxlength="255"
                   required>

        </div>

        <div class="mb-3">

            <label for="sobrenome"
                   class="form-label">
                Sobrenome
            </label>

            <input type="text"
                   class="form-control"
                   id="sobrenome"
                   name="sobrenome"
                   value="{{ $usuario->sobrenome }}"
                   maxlength="255"
                   required>

        </div>

        <div class="mb-3">

            <label for="senha"
                   class="form-label">
                Senha
            </label>

            <input type="password"
                   class="form-control"
                   id="senha"
                   name="senha"
                   maxlength="255"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/usuarios"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>