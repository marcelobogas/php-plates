<?php

namespace App\Controllers\Pages;

use App\Controllers\Controller;
use App\Controllers\Session\SessionStartController;
use App\Models\Pessoa;
use App\Models\Usuario;
use Exception;

class RegisterUserController extends Controller
{
    /**
     * Método responsável por retornar uma página web
     *
     * @return string
     */
    public function index()
    {
        echo $this->view->render("pages/users/register", []);
    }

    /**
     * Método responsável por inserir um novo registro de usuário
     *
     * @param array $data
     *
     * @return string
     */
    public function store($data)
    {
        /* grava na tabela pessoa (1 para pessoa_tipo física e 2 para pessoa_tipo jurídica) */
        $idPessoa = Pessoa::insert(1);

        if (is_null($idPessoa)) {
            throw new \Exception("Error: Falha ao gerar um ID para a pessoa!!", 1);
        }

        /* acrescenta o ID do objeto PESSOA no array de informações do usuário */
        $data['idPessoa'] = $idPessoa;

        /* insere um novo usuário */
        $idUser = Usuario::insert($data);

        if (is_null($idUser)) {
            throw new \Exception("Error: Falha ao criar usuário", 2);
        }

        $session = new SessionStartController();
        $session->start($idUser);

        //echo $this->view->render("pages/dashboard", []);
    }
}
