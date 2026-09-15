<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Financeiro</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>

        body {
            background: #f4f6f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* NAVBAR */

        .navbar {
            background: linear-gradient(135deg, #4f46e5, #7c3aed) !important;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 21px;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: #ffffff !important;
        }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            padding: 8px;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 10px 14px;
        }

        .dropdown-item:hover {
            background: #eef2ff;
            color: #4f46e5;
        }

        /* CONTEÚDO */

        .main-container {
            min-height: calc(100vh - 140px);
        }

        /* CARDS */

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        /* BOTÕES */

        .btn {
            border-radius: 9px;
            font-weight: 500;
            padding: 9px 16px;
        }

        .btn-primary {
            background: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-primary:hover {
            background: #4338ca;
            border-color: #4338ca;
        }

        /* TABELAS */

        .table {
            vertical-align: middle;
        }

        .table thead th {
            color: #475569;
            font-size: 14px;
            text-transform: uppercase;
        }

        /* TÍTULOS */

        .page-title {
            font-weight: bold;
            color: #1e293b;
        }

        .page-subtitle {
            color: #64748b;
        }

        /* RODAPÉ */

        footer {
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

        <div class="container">

            <!-- LOGO -->

            <a class="navbar-brand" href="index.php">

                <i class="bi bi-wallet2 me-2"></i>

                Sistema Financeiro

            </a>

            <!-- MENU MOBILE -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSistema">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- MENU -->

            <div
                class="collapse navbar-collapse"
                id="navbarSistema">

                <ul class="navbar-nav ms-auto">

                    <!-- INÍCIO -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="index.php">

                            <i class="bi bi-house me-1"></i>

                            Início

                        </a>

                    </li>

                    <!-- PESSOAS -->

                    <li class="nav-item dropdown">

                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            <i class="bi bi-people me-1"></i>

                            Pessoas

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="pessoa-create.php">

                                    <i class="bi bi-person-plus me-2"></i>

                                    Cadastrar

                                </a>
                            </li>

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="pessoa-list.php">

                                    <i class="bi bi-list-ul me-2"></i>

                                    Listar

                                </a>
                            </li>

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="pessoa-pesquisar.php">

                                    <i class="bi bi-search me-2"></i>

                                    Pesquisar

                                </a>
                            </li>

                        </ul>

                    </li>

                    <!-- MOVIMENTAÇÕES -->

                    <li class="nav-item dropdown">

                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            <i class="bi bi-cash-stack me-1"></i>

                            Movimentações

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="movimentacao-create.php">

                                    <i class="bi bi-plus-circle me-2"></i>

                                    Nova movimentação

                                </a>
                            </li>

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="movimentacao-list.php">

                                    <i class="bi bi-list-ul me-2"></i>

                                    Listar movimentações

                                </a>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- CONTEÚDO -->

    <main class="container main-container py-4">

        <?php

        if (isset($content)) {

            echo $content;

        }

        ?>

    </main>


    <!-- RODAPÉ -->

    <footer>

        <div class="container">

            <i class="bi bi-wallet2 me-1"></i>

            Sistema Financeiro

            <br>

            <small>
                Controle suas movimentações de forma simples e organizada.
            </small>

        </div>

    </footer>


    <!-- BOOTSTRAP -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
