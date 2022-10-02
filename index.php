<?php

use App\Core\Database;

require_once __DIR__ . "/vendor/autoload.php";

/* verifica conexão com o banco de dados */
Database::verifyConnection();

/* include do gerenciador de rotas */
include __DIR__ . "/router/web.php";