<?php

use Bramus\Router\Router;
use Quockhanh\Asignment2\Controllers\Admin\AdminController;
use Quockhanh\Asignment2\Controllers\Admin\PostController;
use Quockhanh\Asignment2\Controllers\Admin\UserController;
use Quockhanh\Asignment2\Controllers\Auth\AuthController;
use Quockhanh\Asignment2\Controllers\Client\HomeController;

$router = new Router();

$router->get("/", HomeController::class . '@index');
$router->get('/login', AuthController::class . '@index');

$router->mount("/admin", function () use ($router) {
    $router->get("/", AdminController::class . "@index");
    $router->mount("/user", function () use ($router) {
        $router->get("/", UserController::class ."@index");
    });
    $router->mount("/post", function () use ($router) {
        $router->get("/create", PostController::class ."@create");
    });
});

$router->run();
