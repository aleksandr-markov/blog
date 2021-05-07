<?php
use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();

$router->get('/', [\Application\Controllers\PostController::class, 'index']);

$router->get('/posts/create',[\Application\Controllers\PostController::class, 'create']);
$router->post('/posts/store',[\Application\Controllers\PostController::class, 'store']);


$router->get('/posts/{id:\d+}/show',[\Application\Controllers\PostController::class, 'posts']);
$router->get('/posts/user/{user_id:\d+}',[\Application\Controllers\PostController::class, 'userPosts']);
$router->get('/posts/{id:\d+}/edit',[\Application\Controllers\PostController::class, 'edit']);
$router->post('/posts/comments',[\Application\Controllers\PostController::class, 'addComment']);
$router->get('/posts/{id:\d+}/comments',[\Application\Controllers\PostController::class, 'fetchComments']);
// {id:\d+}/{parent_id:\d+}?
//$router->post('/posts/store',[\Application\Controllers\PostController::class, 'store']);
$router->post('/posts/update/{id:\d+}',[\Application\Controllers\PostController::class, 'update']);
$router->get('/posts/{id:\d+}/delete',[\Application\Controllers\PostController::class, 'delete']);

$router->get('/user/logout', [\Application\Controllers\UserController::class, 'logout']);
$router->post('/user/authorize', [\Application\Controllers\UserController::class, 'authorize']);
$router->get('/user/login', [\Application\Controllers\UserController::class, 'login']);
$router->get('/user/join', [\Application\Controllers\UserController::class, 'join']);
$router->get('/user/accountActivation/{hash}', [\Application\Controllers\UserController::class, 'userActivation']);
$router->get('/user/admin', [\Application\Controllers\UserController::class, 'admin']);
$router->post('/user/signup', [\Application\Controllers\UserController::class, 'signup']);
$router->get('/error404', [\Application\Controllers\Error404Controller::class, 'index']);

try {
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (Exception $e) {
    if (substr($e,0, strlen('Phroute\Phroute\Exception\HttpRouteNotFoundException')) == 'Phroute\Phroute\Exception\HttpRouteNotFoundException') {
        header('Location: /error404');
    }
}