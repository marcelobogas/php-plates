<?php

use App\Core\Enviroments;

define('ROOT', "http://{$_SERVER['SERVER_NAME']}/plates");

define('APP_LANGUAGE', "pt-br");

/* carrega o arquivo com as variáveis de ambiente */
Enviroments::load(dirname(__FILE__, 2));

/**
 * Método responsável por retornar uma URL
 *+

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

function pathView()
{
    return ROOT . "/resources/views";
}

function assets()
{
    return ROOT . "/resources/assets";
}