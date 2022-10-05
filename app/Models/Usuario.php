<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Usuario
{
    public static function select()
    {
        //
    }

    /**
     * Method selectById
     *
     * @param int $id
     *
     * @return array
     */
    public static function selectById(int $id)
    {
        echo '<pre>';
        print_r($id);
        echo '</pre>';
        exit;

        $conn = Database::getConnection();

        $sql = "SELECT * FROM viewUsuario WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $response = $conn->fetchAll();

        return (array) $response;
    }

    /**
     * Method insert
     *
     * @param array $data
     *
     * @return integer
     */
    public static function insert(array $data)
    {
        /* obtém uma instância de conexão com o banco de dados */
        $conn = Database::getConnection();

        $sql = "INSERT INTO usuario (idpessoa, nome, email, password, terms, ativo)";
        $sql .= " VALUES ";
        $sql .= "(:idpessoa, :nome, :email, :password, :terms, :ativo)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idpessoa', $data['idPessoa'], PDO::PARAM_INT);
        $stmt->bindValue(':nome', $data['fullname'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':terms', !is_null($data['terms'] ? 1 : 0), PDO::PARAM_INT);
        $stmt->bindValue(':ativo', 1, PDO::PARAM_INT);
        $stmt->execute();

        /* armazena o ID da inserção */
        $lastId = $conn->lastInsertId();

        /* finaliza a conexão com o banco de dados */
        unset($stmt);

        /* retorna o ID criado */
        return $lastId;
    }
}
