<?php  

require_once 'vendor/autoload.php';

$app = new App\App;

$container = $app->getContainer();

$container['errorHandler'] = function() {
	return function($response)
	{
		return $response->setBody("Page not found")->withStatus(404);
	};
};

// Ovo je Closure
$container["config"] = function() {
	return [
		'db_driver' => 'mysql',
		'db_host' => 'localhost',
		'db_name' => 'my-own-framework',
		'db_user' => 'root',
		'db_pass' => ''
	];
};

$container['db'] = function($c) {
	return new PDO(
		$c->config['db_driver'] . ':host=' . $c->config['db_host'] . ';dbname=' . $c->config['db_name'], 
		$c->config['db_user'], 
		$c->config['db_pass']
	);
};

#$app->get('/', [App\Controllers\HomeController::class, 'index']);

$app->get('/', [new App\Controllers\HomeController() , 'index']);

// $app->get('/home', function($response) {
// 	var_dump($response);
// 	die();
// });

$app->get('/users', [new App\Controllers\UserController($container->db), 'index']);

$app->run();




