<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Pessoa;
use App\DAO\PessoaDAO;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pessoa-list.php');
    exit;
}

$id = $_POST['id'] ?? null;
$nome = trim($_POST['nome'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');

if (!$id || !$nome || !$cpf) {
    die("Nome e CPF são obrigatórios.");
}

$pessoa = new Pessoa();

$pessoa->setId((int) $id);
$pessoa->setNome($nome);
$pessoa->setTelefone($telefone);
$pessoa->setCpf($cpf);
$pessoa->setEndereco($endereco);

$dao = new PessoaDAO();

try {

    $resultado = $dao->atualizar($pessoa);

    if ($resultado) {

        header('Location: pessoa-list.php');
        exit;

    } else {

        die("Não foi possível atualizar a pessoa.");

    }

} catch (PDOException $e) {

    die("Erro ao atualizar pessoa: " . $e->getMessage());

}