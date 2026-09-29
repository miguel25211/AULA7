<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

try {
    $pessoas = $dao->listar();
} catch (PDOException $e) {
    die("Erro ao buscar pessoas: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nova Movimentação</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f4f6f9;
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
            padding: 22px;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control,
        .form-select {
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

            <h3>Nova Movimentação</h3>

            <small>
                Cadastre uma entrada ou saída financeira.
            </small>

        </div>


    

        <div class="card-body p-4">

            <form
                action="movimentacao-cadastrar.php"
                method="POST"
            >


                <div class="mb-3">

                    <label
                        for="pessoa_id"
                        class="form-label"
                    >
                        Pessoa
                    </label>

                    <select
                        name="pessoa_id"
                        id="pessoa_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Selecione uma pessoa
                        </option>

                        <?php foreach ($pessoas as $pessoa): ?>

                            <option value="<?= $pessoa['id'] ?>">
                                <?= htmlspecialchars($pessoa['nome']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


              

                <div class="mb-3">

                    <label
                        for="data"
                        class="form-label"
                    >
                        Data
                    </label>

                    <input
                        type="date"
                        name="data"
                        id="data"
                        class="form-control"
                        required
                    >

                </div>


                

                <div class="mb-3">

                    <label
                        for="descricao"
                        class="form-label"
                    >
                        Descrição
                    </label>

                    <input
                        type="text"
                        name="descricao"
                        id="descricao"
                        class="form-control"
                        placeholder="Ex.: Salário mensal"
                        maxlength="255"
                        required
                    >

                </div>



                <div class="mb-3">

                    <label
                        for="tipo"
                        class="form-label"
                    >
                        Tipo
                    </label>

                    <select
                        name="tipo"
                        id="tipo"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Selecione o tipo
                        </option>

                        <option value="entrada">
                            Entrada
                        </option>

                        <option value="saida">
                            Saída
                        </option>

                    </select>

                </div>


              

                <div class="mb-4">

                    <label
                        for="valor"
                        class="form-label"
                    >
                        Valor
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            R$
                        </span>

                        <input
                            type="number"
                            name="valor"
                            id="valor"
                            class="form-control"
                            placeholder="0,00"
                            step="0.01"
                            min="0.01"
                            required
                        >

                    </div>

                </div>


                <!-- BOTÕES -->

                <div class="d-flex justify-content-between">

                    <a
                        href="movimentacao-list.php"
                        class="btn btn-secondary"
                    >
                        ← Voltar
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Salvar Movimentação
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>