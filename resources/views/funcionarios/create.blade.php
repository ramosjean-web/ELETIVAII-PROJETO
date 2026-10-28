<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Novo Funcionário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Novo Funcionário</h2>

    <form action="/funcionarios" method="POST">

        @csrf

        <div class="mb-3">

            <label for="usuarios_id" class="form-label">
                Usuário
            </label>

            <select class="form-select"
                    id="usuarios_id"
                    name="usuarios_id"
                    required>

                <option value="">
                    Selecione um usuário
                </option>

                @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id }}">
                        {{ $usuario->nome }}
                        {{ $usuario->sobrenome }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label for="eh_admin" class="form-label">
                Administrador?
            </label>

            <select class="form-select"
                    id="eh_admin"
                    name="eh_admin"
                    required>

                <option value="">
                    Selecione
                </option>

                <option value="1">Sim</option>

                <option value="0">Não</option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-success">
            Salvar
        </button>

        <a href="/funcionarios"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>