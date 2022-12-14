<?php

use CoffeeCode\Router\Router;

$router = new Router( projectUrl: ROOT );

/* mapeamento do path onde estão os Controllers */
$router->namespace("app\Controllers");

/* rota raiz do sistema */
$router->group( group: null );
$router->get("/", "Auth\LoginController:index");

/* rota para logar usuário no sistema */
$router->group( group: "login" );
$router->get("/", "Auth\LoginController:index");

/* rota para o usuário realizar a troca de senha */
$router->group( group: "forgot-password" );
$router->get("/", "Auth\ForgotPasswordController:index");

/* grupo de rotas para as páginas externa do sistema */
$router->group( group: null );
$router->get("/welcome", "WelcomeController:index");

/* grupo de rotas específica para as ações correspondentes ao usuário do sistema */
$router->group( group: "user" );
$router->get("/register", "Pages\RegisterUserController:index");
$router->get("/profile", "Pages\UserProfileController:index");
$router->post("/register", "Pages\RegisterUserController:store");

/* grupo de rotas para os administradores do sistema */
$router->group( group: "admin" );
$router->get("/dashboard", "Admin\DashboardController:index");

/* grupo de rotas padrão para as páginas internas do sistema */
$router->group( group: "pages" );
$router->get("/dashboard", "Pages\DashboardController:index");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 
 * 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group( group: "error" );
//$router->get("/{errcode}", "ErrorController:error");
$router->get("/{errcode}", function($data) {
    echo "<h1><center>Erro {$data["errcode"]}</center></h1>";
});

/* executa a ação de uma rota */
$router->dispatch();

/* redireciona a requisição URL com erro para a rota responsável realizar o tratamento */
if ($router->error()) {
    $router->redirect( route: "/error/{$router->error()}" );
}