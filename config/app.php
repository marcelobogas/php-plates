<?php

use App\Core\Database;
use App\Core\Enviroments;

/* carrega o arquivo com as variáveis de ambiente */
Enviroments::load(dirname(__FILE__, 2));

/* definição da ULR PADRÃO do projeto */
define('ROOT', getLocal());

/* padrão para as páginas de exibição */
define('APP_LANGUAGE', "pt-br");

/* verifica se existe conexão com o banco de dados */
Database::verifyConnection();

/**
 * Método responsável por retornar uma ULR PADRÃO para o projeto
 *
 * @return string
 */
function getLocal()
{
    if (trim(getenv('APP_ENV')) == "local") {
        /* url para desenvolvimento */
        $url = "http://localhost/plates";
    } else {
        /* url para produção */
        $url = "https://dominio.com.br";
    }

    /* retorna uma URL para o projeto */
    return $url;
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