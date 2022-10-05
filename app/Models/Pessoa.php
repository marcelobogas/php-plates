<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Pessoa
{
    public static function select()
    {
        //
    }

    /**
     * Método responsável por inserir um registro na tabela
     *
     * @param int $idpessoa_tipo
     *
     * @return integer
     */
    public static function insert(int $idpessoa_tipo = null)
    {

        /* obtém uma instância de conexão com o banco de dados */
        $conn = Database::getConnection();

        /* query de instrução sql */
        $sql = "INSERT INTO pessoa (idpessoa_tipo) VALUES (:idpessoa_tipo)";

        /* prepara e executa a ação no banco de dados */
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idpessoa_tipo', !is_null($idpessoa_tipo) ? $idpessoa_tipo : 1, PDO::PARAM_INT);
        $stmt->execute();

        /* armazena o ID da inserção */
        $lastId = $conn->lastInsertId();

        /* finaliza a conexão com o banco de dados */
        unset($stmt);

        /* retorna o ID criado */
        return $lastId;
    }
}
