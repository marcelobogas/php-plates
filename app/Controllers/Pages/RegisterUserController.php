<?php

namespace App\Controllers\Pages;

use App\Controllers\Controller;

class RegisterUserController extends Controller
{

    public function index()
    {
        echo $this->view->render("pages/users/register", []);
    }
    
}
