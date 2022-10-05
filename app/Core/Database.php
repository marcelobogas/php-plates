<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    /**
     * Método construtor da classe
     *
     * @return void
     */
    private function __construct()
    {
        //..
    }

    /**
     * Método responsável por retornar uma conexão com o banco de dados
     *
     * @return Connection
     */
    public static function getConnection()
    {
        /* credenciais de acesso ao banco de dados */
        $pdoConfig  = trim(getenv('DB_CONNECTION'));
        $pdoConfig .= ":host=" . trim(getenv('DB_HOST'));
        $pdoConfig .= ";dbname=" . trim(getenv('DB_DATABASE'));

        try {
            /* verifica se não existe uma conexão existente */
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, trim(getenv('DB_USERNAME')), trim(getenv('DB_PASSWORD')));
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            /* retorna uma string de conexão com o banco de dados */
            return $connection;
        } catch (PDOException $e) {
            /* retorna uma mensagem apresentando o erro ocorrido */
            die("Erro: " . $e->getMessage());
        }
    }

    /**
     * Método responável por verificar se existe conexão com o banco de dados
     *
     * @return void
     */
    public static function verifyConnection()
    {
        $conn = self::getConnection();

        /* retorna a menagem de erro */
        if (isset($conn->connect_error)) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}
