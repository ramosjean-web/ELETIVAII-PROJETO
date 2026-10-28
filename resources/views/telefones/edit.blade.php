<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Telefone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Telefone</h2>

    <form action="/telefones/{{ $telefone->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label for="clientes_id"
                   class="form-label">
                Cliente
            </label>

            <select class="form-select"
                    id="clientes_id"
                    name="clientes_id"
                    required>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}"
                        {{ $telefone->clientes_id == $cliente->id ? 'selected' : '' }}>

                        {{ $cliente->usuario->nome }}
                        {{ $cliente->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label for="telefone"
                   class="form-label">
                Telefone
            </label>

            <input type="text"
                   class="form-control"
                   id="telefone"
                   name="telefone"
                   value="{{ $telefone->telefone }}"
                   maxlength="45"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/telefones"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>