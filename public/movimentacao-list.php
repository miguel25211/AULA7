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
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h1 class="mb-0">
                    Lista de Movimentações
                </h1>

                <a
                    href="movimentacao-create.php"
                    class="btn btn-primary"
                >
                    Nova Movimentação
                </a>

            </div>

            <?php if (count($movimentacoes) > 0): ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

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
                                    <td>

                                        <?php

                                        $credito = $movimentacao['Credito'] ?? 0;
                                        $debito = $movimentacao['Debito'] ?? 0;

                                        if ($credito > 0) {

                                            echo 'R$ ' . number_format(
                                                $credito,
                                                2,
                                                ',',
                                                '.'
                                            );

                                        } else {

                                            echo 'R$ ' . number_format(
                                                $debito,
                                                2,
                                                ',',
                                                '.'
                                            );

                                        }

                                        ?>

                                    </td>

                                    <!-- TIPO -->
                                    <td>

                                        <?php

                                        if ($credito > 0) {
                                            echo 'Entrada';
                                        } else {
                                            echo 'Saída';
                                        }

                                        ?>

                                    </td>

                                    <!-- DATA -->
                                    <td>

                                        <?php

                                        if (!empty($movimentacao['DataOperacao'])) {

                                            echo date(
                                                'd/m/Y',
                                                strtotime($movimentacao['DataOperacao'])
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

                <div class="alert alert-warning">
                    Nenhuma movimentação cadastrada.
                </div>

            <?php endif; ?>

            <a
                href="index.php"
                class="btn btn-secondary"
            >
                Voltar para Início
            </a>

        </div>

    </div>

</div>

</body>

</html>