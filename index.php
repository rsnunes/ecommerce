<?php

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Rsnunes\Page;
use \Rsnunes\PageAdmin;
use \Rsnunes\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get('/admin', function() {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("index");

});

$app->get('/admin/login', function() {

    $page = new PageAdmin([
        "header"=>FALSE,
        "footer"=>FALSE
    ]);

    $page->setTpl("login");

});

$app->post('admin/login', function(){

    User::login();

    header("Location: /admin");
    exit;

});

$app->get("/admin/logout", function(){

    User::logout();

    header("Location: /admin/login");
    exit;
    
});

$app->run();

 ?>