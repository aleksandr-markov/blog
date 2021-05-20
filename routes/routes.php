<?php

use Application\Controllers\Error404Controller;
use Application\Controllers\PostController;
use Application\Controllers\UserController;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

$router = new RouteCollector();

$router->get('/', [PostController::class, 'index']);


$router->group(['prefix' => 'posts'], function ($router) {
    $router->get('/create', [PostController::class, 'create']);
    $router->post('/store', [PostController::class, 'store']);
    $router->get('/{id:\d+}/show', [PostController::class, 'posts']);
    $router->get('/user/{user_id:\d+}', [PostController::class, 'userPosts']);
    $router->get('/{id:\d+}/edit', [PostController::class, 'edit']);
    $router->post('/comments', [PostController::class, 'addComment']);
    $router->get('/{id:\d+}/comments', [PostController::class, 'fetchComments']);
    $router->post('/update/{id:\d+}', [PostController::class, 'update']);
    $router->get('/{id:\d+}/delete', [PostController::class, 'delete']);
    $router->post('/like', [PostController::class, 'like']);
});

$router->group(['prefix' => 'user'], function ($router) {
    $router->get('/logout', [UserController::class, 'logout']);
    $router->post('/authorize', [UserController::class, 'authorize']);
    $router->get('/login', [UserController::class, 'login']);
    $router->get('/join', [UserController::class, 'join']);
    $router->get('/accountActivation/{hash}', [UserController::class, 'userActivation']);
    $router->get('/admin', [UserController::class, 'admin']);
    $router->post('/signup', [UserController::class, 'signup']);
    $router->get('/settings', [UserController::class, 'settings']);
    $router->get('/profile', [UserController::class, 'profile']);
    $router->post('/changeUserPhoto', [UserController::class, 'changeUserPhoto']);

});

$router->group(['prefix' => 'search'], function ($router) {
    $router->get('/main', [PostController::class, 'searchMain']);
    $router->get('/info', [PostController::class, 'search']);
    $router->get('/byUsername/{login}', [PostController::class, 'getPostByUserName']);
});


$router->get('/category/{id:\d+}', [PostController::class, 'getPostByCategory']);


$router->get('/error404', [Error404Controller::class, 'index']);

try {
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (Exception $e) {
    var_dump($e);
}
//    if (substr($e, 0,
//            strlen('Phroute\Phroute\Exception\HttpRouteNotFoundException')) == 'Phroute\Phroute\Exception\HttpRouteNotFoundException') {
//        header('Location: /error404');
