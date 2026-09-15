<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Movimentacao;
use App\DAO\MovimentacaoDAO;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: movimentacao-create.php');
    exit;
}

$descricao = trim($_POST['descricao'] ?? '');
$valor = trim($_POST['valor'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$data = trim($_POST['data'] ?? '');

if ($descricao === '') {
    die('Erro: informe a descrição da movimentação.');
}

if ($valor === '' || !is_numeric($valor)) {
    die('Erro: informe um valor válido.');
}

$valor = (float) $valor;

if ($valor <= 0) {
    die('Erro: o valor deve ser maior que zero.');
}

if ($tipo === '') {
    die('Erro: selecione o tipo da movimentação.');
}

if ($data === '') {
    die('Erro: informe a data da movimentação.');
}

$movimentacao = new Movimentacao();

$movimentacao->setDescricao($descricao);
$movimentacao->setValor($valor);
$movimentacao->setTipo($tipo);
$movimentacao->setData($data);

$dao = new MovimentacaoDAO();

try {

    $dao->inserir($movimentacao);

    header('Location: movimentacao-list.php');
    exit;

} catch (PDOException $e) {

    die('Erro ao cadastrar movimentação: ' . $e->getMessage());
}