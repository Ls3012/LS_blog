<?php

use Router\Router;

require '../vendor/autoload.php';

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

$router -> run();