<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new Rsnunes\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo 'ok'; // json_encode($results);

});

$app->run();

 ?>