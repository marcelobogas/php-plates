<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        echo $this->view->render("auth/login", []);
    }
}
