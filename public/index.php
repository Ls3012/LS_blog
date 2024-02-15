<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

session_start();

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'lt_blog_php');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PSW', 'root');


$router = new Router($_GET['url']);

$router ->get('/', 'App\Controllers\BlogController@homepage'); //A modifier welcome -> homepage ou autre
$router ->get('/posts', 'App\Controllers\BlogController@index');
$router ->get ('/posts/:id','App\Controllers\BlogController@show');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');


//EN TEST
$router->post('/register', 'App\Controllers\UserController@registerPost');
$router->get('/register', 'App\Controllers\UserController@registerForm');

//EN TEST
$router->post('/add-comment/:id', 'App\Controllers\BlogController@addComment');
$router->get('/admin/comments', 'App\Controllers\Admin\CommentController@index');
$router->post('/admin/comments/delete/:id', 'App\Controllers\Admin\CommentController@deleteComment');
$router->post('/admin/comments/approve/:id', 'App\Controllers\Admin\CommentController@approveComment');

//EN TEST

$router->get('/admin/users', 'App\Controllers\UserController@index');
$router->post('/admin/users/delete/:id', 'App\Controllers\UserController@delete');
$router->post('/admin/users/change-status/:id', 'App\Controllers\UserController@changeStatus');

$router->get('/admin/', 'App\Controllers\Admin\PostController@adminHomepage');
$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');

$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id','App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id','App\Controllers\Admin\PostController@update');

try {
    $router -> run();
}     catch (NotFoundException $e)
{
    echo ''. $e->getMessage();
    return $e->error404();
}
