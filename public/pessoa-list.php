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

    <!-- TÍTULO -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>
                Lista de Pessoas
            </h2>

            <p class="text-muted">
                Pessoas cadastradas no sistema
            </p>

        </div>

        <a
            href="pessoa-create.php"
            class="btn btn-primary"
        >
            <i class="bi bi-person-plus"></i>
            Cadastrar Pessoa
        </a>

    </div>


    <!-- PESQUISA -->

    <form
        method="GET"
        class="mb-4"
    >

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
                <i class="bi bi-search"></i>
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


    <!-- LISTA -->

    <?php if (empty($pessoas)): ?>

        <div class="alert alert-info">

            <i class="bi bi-info-circle"></i>

            Nenhuma pessoa encontrada.

        </div>

    <?php else: ?>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nome</th>

                        <th>Telefone</th>

                        <th>CPF</th>

                        <th>Endereço</th>

                        <th class="text-center">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($pessoas as $pessoa): ?>

                        <tr>

                            <!-- ID -->

                            <td>
                                <?= htmlspecialchars($pessoa['id']) ?>
                            </td>


                            <!-- NOME -->

                            <td>
                                <?= htmlspecialchars($pessoa['nome']) ?>
                            </td>


                            <!-- TELEFONE -->

                            <td>
                                <?= htmlspecialchars(
                                    $pessoa['telefone'] ?? ''
                                ) ?>
                            </td>


                            <!-- CPF -->

                            <td>
                                <?= htmlspecialchars($pessoa['cpf']) ?>
                            </td>


                            <!-- ENDEREÇO -->

                            <td>
                                <?= htmlspecialchars(
                                    $pessoa['endereco'] ?? ''
                                ) ?>
                            </td>


                            <!-- AÇÕES -->

                            <td class="text-center">

                                <!-- EDITAR -->

                                <a
                                    href="pessoa-editar.php?id=<?= $pessoa['id'] ?>"
                                    class="btn btn-primary btn-sm"
                                >
                                    <i class="bi bi-pencil"></i>
                                    Editar
                                </a>


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
                                        <i class="bi bi-trash"></i>
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