<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

try {
    // Busca todas as pessoas cadastradas
    $pessoas = $dao->listar();
} catch (PDOException $e) {
    die("Erro ao buscar pessoas: " . $e->getMessage());
}

// Pega o termo digitado
$termo = trim($_GET['termo'] ?? '');

// Filtra pelo nome ou CPF
if ($termo !== '') {

    $pessoas = array_filter($pessoas, function ($pessoa) use ($termo) {

        $nome = $pessoa['nome'] ?? '';
        $cpf = $pessoa['cpf'] ?? '';

        return stripos($nome, $termo) !== false
            || stripos($cpf, $termo) !== false;
    });
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesquisar Pessoas</title>

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
                Pesquisar Pessoas
            </h1>

            <!-- Formulário de pesquisa -->
            <form method="GET">

                <div class="input-group mb-4">

                    <input
                        type="text"
                        name="termo"
                        class="form-control"
                        placeholder="Digite o nome ou CPF"
                        value="<?= htmlspecialchars($termo) ?>"
                    >

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Pesquisar
                    </button>

                </div>

            </form>


            <?php if (count($pessoas) > 0): ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Endereço</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($pessoas as $pessoa): ?>

                                <tr>

                                    <td>
                                        <?= htmlspecialchars($pessoa['id']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($pessoa['nome']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($pessoa['telefone'] ?? '') ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($pessoa['cpf']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($pessoa['endereco'] ?? '') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-warning">
                    Nenhuma pessoa encontrada.
                </div>

            <?php endif; ?>


            <a
                href="pessoa-list.php"
                class="btn btn-secondary"
            >
                Voltar para Lista
            </a>

        </div>

    </div>

</div>

</body>

</html>