<?php

namespace App\DAO;

use App\Config\Database;
use App\Model\Movimentacao;
use PDO;

class MovimentacaoDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $database = new Database();
        $this->conexao = $database->conectar();
    }

    public function inserir(Movimentacao $movimentacao): bool
    {
        $credito = 0;
        $debito = 0;

        if ($movimentacao->getTipo() === 'Entrada') {
            $credito = $movimentacao->getValor();
        } else {
            $debito = $movimentacao->getValor();
        }

        $sql = "
            INSERT INTO movimentacao
            (descricao, Credito, Debito, DataOperacao)
            VALUES
            (:descricao, :credito, :debito, :dataOperacao)
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(
            ':descricao',
            $movimentacao->getDescricao(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':credito',
            $credito
        );

        $stmt->bindValue(
            ':debito',
            $debito
        );

        $stmt->bindValue(
            ':dataOperacao',
            $movimentacao->getData(),
            PDO::PARAM_STR
        );

        return $stmt->execute();
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM movimentacao ORDER BY id DESC";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}