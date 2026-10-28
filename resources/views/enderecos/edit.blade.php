<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Endereço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Editar Endereço</h2>

    <form action="/enderecos/{{ $endereco->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">Cliente</label>

            <select name="clientes_id"
                    class="form-select"
                    required>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}"
                        {{ $endereco->clientes_id == $cliente->id ? 'selected' : '' }}>

                        {{ $cliente->usuario->nome }}
                        {{ $cliente->usuario->sobrenome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Logradouro</label>

            <input type="text"
                   name="logradouro"
                   class="form-control"
                   value="{{ $endereco->logradouro }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número</label>

            <input type="text"
                   name="numero"
                   class="form-control"
                   value="{{ $endereco->numero }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro</label>

            <input type="text"
                   name="bairro"
                   class="form-control"
                   value="{{ $endereco->bairro }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">CEP</label>

            <input type="text"
                   name="cep"
                   class="form-control"
                   value="{{ $endereco->cep }}"
                   maxlength="9"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cidade</label>

            <input type="text"
                   name="cidade"
                   class="form-control"
                   value="{{ $endereco->cidade }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">UF</label>

            <input type="text"
                   name="uf"
                   class="form-control"
                   value="{{ $endereco->uf }}"
                   maxlength="2"
                   required>
        </div>

        <button type="submit"
                class="btn btn-warning">
            Atualizar
        </button>

        <a href="/enderecos"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>