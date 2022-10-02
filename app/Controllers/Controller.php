<?php

namespace App\Controllers;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        // Create new Plates instance
        $this->view = new Engine(__DIR__ . "/../../resources/views");
    }

}
