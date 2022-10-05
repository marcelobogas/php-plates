<?php

namespace App\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        // Render a template
        echo $this->view->render('welcome', ['date' => date('d/m/Y')]);
    }
}
