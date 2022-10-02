<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function error(array $data)
    {
        echo $this->view->render("404", ["errcode" => $data["errcode"]]);
    }
}
