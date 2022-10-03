<?php

namespace App\Controllers\Pages;

use App\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index()
    {
        echo $this->view->render("pages/users/profile", []);
    }
}
