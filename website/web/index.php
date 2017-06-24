<?php

error_reporting(E_ALL);
session_start();


require_once("../vendor/autoload.php");
$factory = MakiJagodic\Factory::createFromInitFile(__DIR__."/../config.ini");

switch($_SERVER["REQUEST_URI"]) {
	case "/":
		$factory->getIndexController()->homepage();
		break;
	case "/login":
		$controller = $factory->getLoginController();
		if ($_SERVER["REQUEST_METHOD"] === "GET")
		{
			$controller->showLogin();
		}
		else 
		{
			$controller->login($_POST);
		}
		break;
	case "/index":
		$controller = $factory->getIndexController();
		if ($_SERVER["REQUEST_METHOD"] === "GET")
		{
			$controller->homepage();
		}
		break;
	case "/edituser":
		$controller = $factory->getIndexController();
		if ($_SERVER["REQUEST_METHOD"]=== "GET")
		{
			$controller->edituser($_POST);
		}
		break;
		case "/editplan":
			$controller = $factory->getIndexController();
			if ($_SERVER["REQUEST_METHOD"]=== "GET")
			{
				$controller->editplan($_POST);
			}
			break;
	default:
		echo "Not Found";
}

