<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\MovimentacaoDAO;

$dao = new MovimentacaoDAO();

try {
    $movimentacoes = $dao->listar();
} catch (PDOException $e) {
    die("Erro ao buscar movimentações: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Movimentações</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f4f6f9;
        }

        .container {
            max-width: 1100px;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .card-header small {
            opacity: 0.9;
        }

        .table {
            vertical-align: middle;
        }

        .table th {
            white-space: nowrap;
        }

        .entrada {
            color: #198754;
            font-weight: bold;
        }

        .saida {
            color: #dc3545;
            font-weight: bold;
        }

        .valor {
            font-weight: 600;
        }

        .btn {
            border-radius: 8px;
        }

        .btn-nova {
            background-color: white;
            color: #0d6efd;
            border: none;
        }

        .btn-nova:hover {
            background-color: #f0f0f0;
            color: #0a58ca;
        }

        .empty {
            padding: 30px;
            text-align: center;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="card shadow">

        <!-- CABEÇALHO -->

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3>
                        Lista de Movimentações
                    </h3>

                    <small>
                        Consulte as entradas e saídas cadastradas.
                    </small>

                </div>

                <a
                    href="movimentacao-create.php"
                    class="btn btn-nova"
                >
                    + Nova Movimentação
                </a>

            </div>

        </div>


        <!-- CONTEÚDO -->

        <div class="card-body p-4">

            <?php if (count($movimentacoes) > 0): ?>

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>

                                <th>Descrição</th>

                                <th>Valor</th>

                                <th>Tipo</th>

                                <th>Data</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php foreach ($movimentacoes as $movimentacao): ?>

                            <?php

                            $credito = $movimentacao['Credito'] ?? 0;
                            $debito = $movimentacao['Debito'] ?? 0;

                            ?>

                            <tr>

                                <!-- ID -->

                                <td>
                                    <?= htmlspecialchars($movimentacao['id']) ?>
                                </td>


                                <!-- DESCRIÇÃO -->

                                <td>
                                    <?= htmlspecialchars($movimentacao['descricao']) ?>
                                </td>


                                <!-- VALOR -->

                                <td class="valor">

                                    <?php if ($credito > 0): ?>

                                        <span class="entrada">

                                            + R$

                                            <?= number_format(
                                                $credito,
                                                2,
                                                ',',
                                                '.'
                                            ) ?>

                                        </span>

                                    <?php elseif ($debito > 0): ?>

                                        <span class="saida">

                                            - R$

                                            <?= number_format(
                                                $debito,
                                                2,
                                                ',',
                                                '.'
                                            ) ?>

                                        </span>

                                    <?php else: ?>

                                        R$ 0,00

                                    <?php endif; ?>

                                </td>


                                <!-- TIPO -->

                                <td>

                                    <?php if ($credito > 0): ?>

                                        <span class="entrada">
                                            Entrada
                                        </span>

                                    <?php elseif ($debito > 0): ?>

                                        <span class="saida">
                                            Saída
                                        </span>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>


                                <!-- DATA -->

                                <td>

                                    <?php

                                    if (!empty($movimentacao['DataOperacao'])) {

                                        echo date(
                                            'd/m/Y',
                                            strtotime(
                                                $movimentacao['DataOperacao']
                                            )
                                        );

                                    } else {

                                        echo '-';

                                    }

                                    ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-warning empty">

                    <h5>Nenhuma movimentação cadastrada.</h5>

                    <p class="mb-0">
                        Clique em "Nova Movimentação" para cadastrar uma.
                    </p>

                </div>

            <?php endif; ?>


            <!-- BOTÃO VOLTAR -->

            <div class="mt-3">

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    ← Voltar para Início
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>