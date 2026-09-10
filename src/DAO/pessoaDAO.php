<?php

namespace App\DAO;

use App\Config\Database;
use PDO;
use App\Model\Pessoa;

class PessoaDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $database = new Database();
        $this->conexao = $database->conectar();
    }

    public function inserir(Pessoa $pessoa): bool
    {
        $sql = "
            INSERT INTO pessoas
            (nome, telefone, cpf, endereco)
            VALUES
            (:nome, :telefone, :cpf, :endereco)
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':nome', $pessoa->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $pessoa->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $pessoa->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $pessoa->getEndereco(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM pessoas ORDER BY id DESC";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}