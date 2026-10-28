<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultar Funcionário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container py-3">

    <h2>Consultar Funcionário</h2>

    <div class="mb-3">

        <label class="form-label">
            Registro
        </label>

        <input type="text"
               class="form-control"
               value="{{ $funcionario->registro }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Funcionário
        </label>

        <input type="text"
               class="form-control"
               value="{{ $funcionario->usuario->nome }} {{ $funcionario->usuario->sobrenome }}"
               readonly>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Administrador
        </label>

        <input type="text"
               class="form-control"
               value="{{ $funcionario->eh_admin == 1 ? 'Sim' : 'Não' }}"
               readonly>

    </div>

    <a href="/funcionarios"
       class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>