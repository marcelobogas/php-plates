<?php

namespace App\Controllers;

use League\Plates\Engine;

abstract class Controller
{
    protected $view;

    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        // Create new Plates instance
        $this->view = new Engine(__DIR__ . "/../../resources/views");
    }
}
