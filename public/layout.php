<?php

if (!isset($content)) {
    $content = '';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Sistema Financeiro</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #212529;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 12px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #343a40;
        }

        .page-content {
            padding: 30px;
        }

        .page-title {
            font-weight: 600;
        }

        .page-subtitle {
            color: #6c757d;
        }

        .menu-title {
            color: #adb5bd;
            font-size: 12px;
            text-transform: uppercase;
            padding: 20px 15px 5px;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- MENU LATERAL -->

        <aside class="col-md-3 col-lg-2 sidebar p-0">

            <!-- LOGO -->

            <div class="p-4 text-white">

                <h4>

                    <i class="bi bi-wallet2"></i>

                    Financeiro

                </h4>

            </div>


            <nav class="nav flex-column">

                <!-- INÍCIO -->

                <a
                    href="index.php"
                    class="nav-link"
                >

                    <i class="bi bi-house me-2"></i>

                    Início

                </a>


                <!-- PESSOAS -->

                <div class="menu-title">
                    Pessoas
                </div>

                <a
                    href="pessoa-list.php"
                    class="nav-link"
                >

                    <i class="bi bi-people me-2"></i>

                    Lista de Pessoas

                </a>

                <a
                    href="pessoa-create.php"
                    class="nav-link"
                >

                    <i class="bi bi-person-plus me-2"></i>

                    Registrar Pessoa

                </a>


                <!-- MOVIMENTAÇÕES -->

                <div class="menu-title">
                    Movimentações
                </div>

                <a
                    href="movimentacao-list.php"
                    class="nav-link"
                >

                    <i class="bi bi-arrow-left-right me-2"></i>

                    Movimentações

                </a>

                <a
                    href="movimentacao-form.php"
                    class="nav-link"
                >

                    <i class="bi bi-plus-circle me-2"></i>

                    Nova movimentação

                </a>

            </nav>

        </aside>


        <!-- CONTEÚDO -->

        <main class="col-md-9 col-lg-10 page-content">

            <?= $content ?>

        </main>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
>
</script>

</body>

</html>