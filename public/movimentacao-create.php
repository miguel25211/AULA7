<?php

require __DIR__ . '/../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Movimentação</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h1 class="mb-4">
                Cadastrar Movimentação
            </h1>

            <form action="movimentacao-cadastrar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Descrição
                    </label>

                    <input
                        type="text"
                        name="descricao"
                        class="form-control"
                        maxlength="255"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Valor
                    </label>

                    <input
                        type="number"
                        name="valor"
                        class="form-control"
                        step="0.01"
                        min="0"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Tipo
                    </label>

                    <select
                        name="tipo"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Selecione
                        </option>

                        <option value="Entrada">
                            Entrada
                        </option>

                        <option value="Saída">
                            Saída
                        </option>

                    </select>

                </div>


                <div class="mb-4">

                    <label class="form-label">
                        Data
                    </label>

                    <input
                        type="date"
                        name="data"
                        class="form-control"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Cadastrar
                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    Voltar
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>