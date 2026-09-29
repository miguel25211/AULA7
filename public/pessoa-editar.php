<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\PessoaDAO;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: pessoa-list.php');
    exit;
}

$id = (int) $_GET['id'];

$dao = new PessoaDAO();

try {

    $pessoa = $dao->buscarPorId($id);

    if ($pessoa === null) {
        die("Pessoa não encontrada.");
    }

} catch (PDOException $e) {

    die("Erro ao buscar pessoa: " . $e->getMessage());

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Pessoa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f6fa;
        }

        .container {
            max-width: 800px;
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

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-1">
                Editar Pessoa
            </h3>

            <small>
                Altere os dados da pessoa.
            </small>

        </div>

        <div class="card-body p-4">

            <form
                action="pessoa-atualizar.php"
                method="POST"
            >

                <!-- ID -->

                <input
                    type="hidden"
                    name="id"
                    value="<?= $pessoa->getId() ?>"
                >


                <!-- NOME -->

                <div class="mb-3">

                    <label
                        for="nome"
                        class="form-label"
                    >
                        Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="form-control"
                        value="<?= htmlspecialchars($pessoa->getNome()) ?>"
                        maxlength="100"
                        required
                    >

                </div>


                <!-- TELEFONE -->

                <div class="mb-3">

                    <label
                        for="telefone"
                        class="form-label"
                    >
                        Telefone
                    </label>

                    <input
                        type="text"
                        name="telefone"
                        id="telefone"
                        class="form-control"
                        value="<?= htmlspecialchars($pessoa->getTelefone() ?? '') ?>"
                        maxlength="15"
                    >

                </div>


                <!-- CPF -->

                <div class="mb-3">

                    <label
                        for="cpf"
                        class="form-label"
                    >
                        CPF
                    </label>

                    <input
                        type="text"
                        name="cpf"
                        id="cpf"
                        class="form-control"
                        value="<?= htmlspecialchars($pessoa->getCpf()) ?>"
                        maxlength="11"
                        required
                    >

                </div>


                <!-- ENDEREÇO -->

                <div class="mb-4">

                    <label
                        for="endereco"
                        class="form-label"
                    >
                        Endereço
                    </label>

                    <input
                        type="text"
                        name="endereco"
                        id="endereco"
                        class="form-control"
                        value="<?= htmlspecialchars($pessoa->getEndereco() ?? '') ?>"
                        maxlength="255"
                    >

                </div>


                <!-- BOTÕES -->

                <div class="d-flex gap-2">

                    <a
                        href="pessoa-list.php"
                        class="btn btn-secondary"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Salvar Alterações
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>