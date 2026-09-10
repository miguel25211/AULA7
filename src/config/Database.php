<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private string $host = 'localhost';
    private string $dbname = 'aula6';
    private string $username = 'root';
    private string $password = '';

    public function conectar(): PDO
    {
        try {

            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

            $pdo = new PDO(
                $dsn,
                $this->username,
                $this->password
            );

            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $pdo;

        } catch (PDOException $e) {

            die("Erro na conexão: " . $e->getMessage());

        }
    }
}