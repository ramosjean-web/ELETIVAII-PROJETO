<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Adicional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Adicional</h2>

    <form action="/adicionais/{{ $adicional->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Ingrediente
            </label>

            <select name="ingredientes_id"
                    class="form-select"
                    required>

                @foreach($ingredientes as $ingrediente)

                    <option value="{{ $ingrediente->id }}"
                        {{ $adicional->ingredientes_id == $ingrediente->id ? 'selected' : '' }}>

                        {{ $ingrediente->nome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Preço Extra
            </label>

            <input type="number"
                   name="preco_extra"
                   class="form-control"
                   min="0"
                   step="0.01"
                   value="{{ $adicional->preco_extra }}"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/adicionais"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>