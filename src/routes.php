<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', "LoginController@login");
$router->post('/login', "LoginController@loginAction");

$router->get('/signup', "LoginController@signup");
$router->post('/signup', "LoginController@signupAction");

$router->get('/edit/{id}/{service}', "HomeController@edit");
$router->post('/edit', "HomeController@editAction");

$router->get('/excluir/{id}/{service}', "HomeController@excluir");

$router->get('/orders', "HomeController@orders");