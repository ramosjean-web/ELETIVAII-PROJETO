<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Cliente</h2>

    <form action="/clientes/{{ $cliente->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label for="usuarios_id"
                   class="form-label">
                Usuário
            </label>

            <select class="form-select"
                    id="usuarios_id"
                    name="usuarios_id"
                    required>

                @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id }}"
                        {{ $cliente->usuarios_id == $usuario->id ? 'selected' : '' }}>

                        {{ $usuario->nome }}
                        {{ $usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label for="email"
                   class="form-label">
                E-mail
            </label>

            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   value="{{ $cliente->email }}"
                   maxlength="255"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/clientes"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>