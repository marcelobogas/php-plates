<?php

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("app\Controllers");

$router->group( group: null );
$router->get("/", "Auth\LoginController:index");

$router->group( group: "login" );
$router->get("/", "Auth\LoginController:index");

$router->group( group: "forgot-password" );
$router->get("/", "Auth\ForgotPasswordController:index");

$router->group( group: "admin" );
$router->get("/dashboard", "Admin\DashboardController:index");

$router->group( group: "user" );
$router->get("/register", "Pages\RegisterUserController:index");
$router->post("/register", "Pages\RegisterUserController:store");

$router->group( group: "ooops" );
$router->get("/{errcode}", "ErrorController:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect( route: "/ooops/{$router->error()}" );
}