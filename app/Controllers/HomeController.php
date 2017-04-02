<?php  

namespace App\Controllers;

use \PDO;

class HomeController
{
	// public function __construct(PDO $db) 
	// {
	// 	var_dump($db);
	// 	die();
	// }

	public function index($response)
	{
		return $response->setBody("Home");
	}

	public function home()
	{
		echo "Home 2";
	}
}


