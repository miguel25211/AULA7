<?php

namespace App\DAO;

use App\Config\Database;
use App\Model\Pessoa;
use PDO;

class PessoaDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $database = new Database();
        $this->conexao = $database->conectar();
    }

    // CADASTRAR
    public function inserir(Pessoa $pessoa): bool
    {
        $sql = "
            INSERT INTO pessoas
            (nome, telefone, cpf, endereco)
            VALUES
            (:nome, :telefone, :cpf, :endereco)
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(
            ':nome',
            $pessoa->getNome(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':telefone',
            $pessoa->getTelefone(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':cpf',
            $pessoa->getCpf(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':endereco',
            $pessoa->getEndereco(),
            PDO::PARAM_STR
        );

        return $stmt->execute();
    }


    // LISTAR
    public function listar(): array
    {
        $sql = "
            SELECT *
            FROM pessoas
            ORDER BY id DESC
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // BUSCAR POR ID
    public function buscarPorId(int $id): ?Pessoa
    {
        $sql = "
            SELECT *
            FROM pessoas
            WHERE id = :id
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );

        $stmt->execute();

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        $pessoa = new Pessoa();

        $pessoa->setId($dados['id']);
        $pessoa->setNome($dados['nome']);
        $pessoa->setTelefone($dados['telefone']);
        $pessoa->setCpf($dados['cpf']);
        $pessoa->setEndereco($dados['endereco']);

        return $pessoa;
    }


    // ATUALIZAR
    public function atualizar(Pessoa $pessoa): bool
    {
        $sql = "
            UPDATE pessoas
            SET
                nome = :nome,
                telefone = :telefone,
                cpf = :cpf,
                endereco = :endereco
            WHERE id = :id
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(
            ':nome',
            $pessoa->getNome(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':telefone',
            $pessoa->getTelefone(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':cpf',
            $pessoa->getCpf(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':endereco',
            $pessoa->getEndereco(),
            PDO::PARAM_STR
        );

        $stmt->bindValue(
            ':id',
            $pessoa->getId(),
            PDO::PARAM_INT
        );

        return $stmt->execute();
    }


    // EXCLUIR
    public function excluir(int $id): bool
    {
        $sql = "
            DELETE FROM pessoas
            WHERE id = :id
        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );

        return $stmt->execute();
    }
}