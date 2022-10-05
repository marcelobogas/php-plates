<?php

namespace App\Controllers\Session;

use App\Controllers\Controller;
use App\Models\Usuario;
use CoffeeCode\Router\Router;

class SessionStartController extends Controller
{
    public function __construct()
    {
        //
    }

    public function start(int $id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            $this->sessionStart();

            /* cria um id para a sessão */
            $_SESSION['sessionId'] = session_id();
            $_SESSION['userData']  = $this->getUserData($id);
        }

        $router = new Router(projectUrl: ROOT);

        echo $this->view->render("pages/dashboard", []);
    }

    /**
     * Método responsável por obter os dados do usuário com base no ID informado
     *
     * @param int $id
     *
     * @return void
     */
    private function getUserData(int $id)
    {
        $user = Usuario::selectById($id);
    }

    /**
     * Método responsável por iniciar uma sessão para a conexão
     *
     * @return SESSION
     */
    private function sessionStart()
    {
        session_start();
    }
}
