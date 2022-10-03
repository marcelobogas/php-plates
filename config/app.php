<?php

use App\Core\Database;
use App\Core\Enviroments;

/* definição da ULR PADRÃO do projeto */
define('ROOT', getLocal());

/* padrão para as páginas de exibição */
define('APP_LANGUAGE', "pt-br");

/* carrega o arquivo com as variáveis de ambiente */
Enviroments::load(dirname(__FILE__, 2));

/* verifica se existe conexão com o banco de dados */
Database::verifyConnection();

/**
 * Método responsável por retornar uma ULR PADRÃO para o projeto
 *
 * @return string
 */
function getLocal()
{
    if ($_SERVER['SERVER_NAME'] == "localhost") {
        /* url para desenvolvimento */
        return "http://localhost/plates";
    } else {
        /* url para produção */
        return "https://dominio.com.br";
    }
}

/**
 * Método responsável por retornar uma URL
 *
 * @param string $uri
 *
 * @return string
 */
function url(string $uri = null)
{
    if (!is_null($uri)) {
        return ROOT . "/{$uri}";
    } else {
        return ROOT;
    }
}

/**
 * Método responsável por mapear o PATH para os arquivos 
 * (css, js, scss...) do projeto
 *
 * @return void
 */
function assets()
{
    return ROOT . "/resources/assets";
}