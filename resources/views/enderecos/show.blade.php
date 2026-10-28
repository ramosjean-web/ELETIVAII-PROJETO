<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Endereço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Endereço</h2>

    <p>
        <strong>Cliente:</strong>
        {{ $endereco->cliente->usuario->nome }}
        {{ $endereco->cliente->usuario->sobrenome }}
    </p>

    <p>
        <strong>Logradouro:</strong>
        {{ $endereco->logradouro }}
    </p>

    <p>
        <strong>Número:</strong>
        {{ $endereco->numero }}
    </p>

    <p>
        <strong>Bairro:</strong>
        {{ $endereco->bairro }}
    </p>

    <p>
        <strong>CEP:</strong>
        {{ $endereco->cep }}
    </p>

    <p>
        <strong>Cidade:</strong>
        {{ $endereco->cidade }}
    </p>

    <p>
        <strong>UF:</strong>
        {{ $endereco->uf }}
    </p>

    <a href="/enderecos"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>