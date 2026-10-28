<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Funcionário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Funcionário</h2>

    <form action="/funcionarios/{{ $funcionario->registro }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label for="usuarios_id" class="form-label">
                Usuário
            </label>

            <select class="form-select"
                    id="usuarios_id"
                    name="usuarios_id"
                    required>

                @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id }}"
                        {{ $funcionario->usuarios_id == $usuario->id ? 'selected' : '' }}>

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

                <option value="1"
                    {{ $funcionario->eh_admin == 1 ? 'selected' : '' }}>
                    Sim
                </option>

                <option value="0"
                    {{ $funcionario->eh_admin == 0 ? 'selected' : '' }}>
                    Não
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/funcionarios"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>