<?php

use Bramus\Router\Router;
use Quockhanh\Asignment2\Controllers\Admin\AdminController;
use Quockhanh\Asignment2\Controllers\Admin\CategoriesController;
use Quockhanh\Asignment2\Controllers\Admin\PostController;
use Quockhanh\Asignment2\Controllers\Admin\UserController;
use Quockhanh\Asignment2\Controllers\Auth\AuthController;
use Quockhanh\Asignment2\Controllers\Client\HomeController;
use Quockhanh\Asignment2\common\Controller;


$router = new Router();

$router->get("/", HomeController::class . '@index');
$router->get("/profile", HomeController::class . '@profile');
$router->match('GET|POST','/auth/login', AuthController::class . '@login');
$router->mount("/admin", function () use ($router) {
    $router->get("/", AdminController::class . "@index");
    $router->get("/logout", AuthController::class . "@logout");
    $router->mount("/user", function () use ($router) {
        $router->get("/", UserController::class . "@index");
        $router->match('GET|POST', '/create',  UserController::class . '@create');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->get("/{id}/show", UserController::class . "@show");
        $router->get("/{id}/delete", UserController::class ."@delete");
    });
    $router->mount('/categories', function () use ($router) {
        $router->get('/',                                   CategoriesController::class . '@index');
        $router->get('/{id}/delete',                        CategoriesController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', CategoriesController::class . '@update');
        $router->match('GET|POST', '/create',      CategoriesController::class . '@create');
    });
    $router->mount("/post", function () use ($router) {
        $router->get("/", PostController::class . "@index");
        $router->match('GET|POST',"/create", PostController::class . "@create");
        $router->get("/{id}/delete", PostController::class ."@delete");
        $router->match('GET|POST',"/{id}/update", PostController::class ."@update");
    });
});

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/admin/*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});


//Nếu không có đường dẫn nào đúng thì về trang 404
$router->set404(function () {
    return (new Controller())->renderMessages('404');
});

$router->run();
