<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        echo $this->view->render("admin/dashboard", []);
    }
}
