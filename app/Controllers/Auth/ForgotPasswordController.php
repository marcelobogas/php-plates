<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        echo $this->view->render("auth/forgot-password", []);
    }
}
