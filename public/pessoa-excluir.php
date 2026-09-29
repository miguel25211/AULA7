<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DAO\PessoaDAO;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pessoa-list.php');
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header('Location: pessoa-list.php');
    exit;
}

$id = (int) $_POST['id'];

$dao = new PessoaDAO();

try {

    $dao->excluir($id);

    header('Location: pessoa-list.php');

    exit;

} catch (PDOException $e) {

    die("Erro ao excluir pessoa: " . $e->getMessage());

}