<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iolanda Lanches | Atendimento</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="dashboard">

        <!-- MENU LATERAL -->
        <aside class="menu-lateral">

            <div class="logo">
                <img src="{{ asset('img/iolanda.jpg') }}" alt="Iolanda Lanches">
                <h2>Iolanda Lanches</h2>
                <p>Atendimento</p>
            </div>

            <nav>
                <a href="#" class="ativo">
                    🏠 Início
                </a>

                <a href="#">
                    🛒 Novo Pedido
                </a>

                <a href="#">
                    📋 Pedidos
                </a>

                <a href="#">
                    👤 Clientes
                </a>

                <a href="#">
                    🍔 Produtos
                </a>
            </nav>

            <div class="sair">
                <a href="#">🚪 Sair</a>
            </div>

        </aside>


        <!-- CONTEÚDO -->
        <main class="conteudo">

            <header class="topo">
                <div>
                    <h1>Olá, Atendente!</h1>
                    <p>Bem-vindo ao sistema da Iolanda Lanches.</p>
                </div>

                <div class="usuario">
                    👤 Atendente
                </div>
            </header>


            <!-- CARDS -->
            <section class="cards">

                <div class="card">
                    <div class="icone">🛒</div>

                    <div>
                        <p>Pedidos de Hoje</p>
                        <h2>0</h2>
                    </div>
                </div>


                <div class="card">
                    <div class="icone">👨‍🍳</div>

                    <div>
                        <p>Em Preparo</p>
                        <h2>0</h2>
                    </div>
                </div>


                <div class="card">
                    <div class="icone">✅</div>

                    <div>
                        <p>Pedidos Prontos</p>
                        <h2>0</h2>
                    </div>
                </div>

            </section>


            <!-- NOVO PEDIDO -->
            <section class="acoes">

                <div>
                    <h2>Atendimento</h2>
                    <p>Registre um novo pedido para o cliente.</p>
                </div>

                <a href="#" class="botao-pedido">
                    + Novo Pedido
                </a>

            </section>


            <!-- PEDIDOS RECENTES -->
            <section class="pedidos">

                <div class="titulo-pedidos">
                    <h2>Pedidos Recentes</h2>

                    <a href="#">Ver todos</a>
                </div>

                <table>

                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Recebimento</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td colspan="5" class="sem-pedidos">
                                Nenhum pedido registrado.
                            </td>
                        </tr>

                    </tbody>

                </table>

            </section>

        </main>

    </div>

</body>
</html>