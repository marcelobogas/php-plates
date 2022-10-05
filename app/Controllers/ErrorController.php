<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    /**
     * Método responsável por retornar a página correspondente
     * ao erro de requisição pela url
     *
     * @param array $data
     *
     * @return void
     */
    public function error(array $data)
    {
        echo $this->view->render($data['errcode'], ["errcode" => $data["errcode"]]);
    }
}
