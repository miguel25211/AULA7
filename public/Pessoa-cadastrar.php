<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Pessoa;
use App\DAO\PessoaDAO;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pessoa-create.php');
    exit;
}

$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? null;
$cpf = $_POST['cpf'] ?? '';
$endereco = $_POST['endereco'] ?? null;

if ($nome === '' || $cpf === '') {
    die('Nome e CPF são obrigatórios.');
}

$pessoa = new Pessoa();

$pessoa->setNome($nome);
$pessoa->setTelefone($telefone);
$pessoa->setCpf($cpf);
$pessoa->setEndereco($endereco);

$dao = new PessoaDAO();

try {

    $dao->inserir($pessoa);

    echo "<h2>Pessoa cadastrada com sucesso!</h2>";

    echo '<a href="pessoa-create.php" class="btn btn-primary">
            Cadastrar outra pessoa
          </a>';

} catch (PDOException $e) {

    echo "Erro ao cadastrar: " . $e->getMessage();

}