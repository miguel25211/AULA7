<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

try {
    $pessoas = $dao->listar();
} catch (PDOException $e) {
    die("Erro ao buscar pessoas: " . $e->getMessage());
}

/* Pesquisa pelo nome */
$nomePesquisa = trim($_GET['nome'] ?? '');

if ($nomePesquisa !== '') {
    $pessoas = array_filter($pessoas, function ($pessoa) use ($nomePesquisa) {

        return stripos(
            $pessoa['nome'],
            $nomePesquisa
        ) !== false;

    });
}

ob_start();
?>

<div class="container">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Pessoas</h2>

        <a href="pessoa-create.php" class="btn btn-primary">
            Cadastrar Pessoa
        </a>

    </div>


    <!-- Pesquisa -->
    <form method="GET" class="mb-4">

        <div class="input-group">

            <input
                type="text"
                name="nome"
                class="form-control"
                placeholder="Digite o nome da pessoa"
                value="<?= htmlspecialchars($nomePesquisa) ?>"
            >

            <button
                type="submit"
                class="btn btn-primary"
            >
                Pesquisar
            </button>

            <?php if ($nomePesquisa !== ''): ?>

                <a
                    href="pessoa-list.php"
                    class="btn btn-secondary"
                >
                    Limpar
                </a>

            <?php endif; ?>

        </div>

    </form>


    <!-- Lista -->
    <?php if (empty($pessoas)): ?>

        <div class="alert alert-info">
            Nenhuma pessoa encontrada.
        </div>

    <?php else: ?>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Endereço</th>
                        <th>Ações</th>
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
                                <?= htmlspecialchars(
                                    $pessoa['telefone'] ?? ''
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($pessoa['cpf']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $pessoa['endereco'] ?? ''
                                ) ?>
                            </td>

                            <td>

                                <!-- EDITAR -->
                                <form
                                    action="pessoa-editar.php"
                                    method="POST"
                                    style="display: inline;"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= htmlspecialchars($pessoa['id']) ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Editar
                                    </button>

                                </form>


                                <!-- EXCLUIR -->
                                <form
                                    action="pessoa-excluir.php"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta pessoa?');"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= htmlspecialchars($pessoa['id']) ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        Excluir
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</div>

<?php

$content = ob_get_clean();

require "layout.php";
require "footer.php";

?>