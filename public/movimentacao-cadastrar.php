<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Movimentacao;
use App\DAO\MovimentacaoDAO;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: movimentacao-create.php');
    exit;
}

$descriçao = trim($_POST['descricao'] ?? '');
$valor = $_POST['valor'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$data = $_POST['data'] ?? '';

if ($descricao === '' || $valor === '' || $tipo === '' || $data === '') {
    die('Preencha todos os campos.');
}

$movimentacao = new Movimentacao();

$movimentacao->setDescricao($descricao);
$movimentacao->setValor((float) $valor);
$movimentacao->setTipo($tipo);
$movimentacao->setData($data);

$dao = new MovimentacaoDAO();

try {

    $dao->inserir($movimentacao);

   header("Location: movimentacao-list.php");
    exit;

} catch (PDOException $e) {

    die("Erro ao cadastrar movimentação: " . $e->getMessage());

}