<?php

namespace App\Controllers\Pages;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        echo $this->view->render("pages/dashboard", []);
    }
}
