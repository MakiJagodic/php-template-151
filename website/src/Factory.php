<?php 

namespace MakiJagodic;
class Factory
{
	public static function createFromInitFile($filename)
	{
		return new Factory(
			parse_ini_file($filename, true)
		);
	}
	public function __construct(array $config)
	{
		$this->config = $config;
	}
	public function getTemplateEngine()
	{
		return new SimpleTemplateEngine(__DIR__ . "/../templates/");
	}
	public function getIndexController()
	{
		return new Controller\IndexController(
				$this->getTemplateEngine(),
				$this->getStundenPlanPdoService(),
				$this->getUserService()
				);
	}
	
	private function getTwigEngine()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../templates/");
		return new \Twig_Environment($loader);
	}
	
	public function getLoginController()
	{
		return new Controller\LoginController($this->getTemplateEngine(), $this->getLoginPdoService());
	}
	public function getPdo()
	{
		return new \PDO(
		"mysql:host=mariadb;dbname=app;charset=utf8",
		$this->config["database"]["user"],
		"my-secret-pw",
		[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
		);
	}
	public function getLoginPdoService()
	{
		return new Service\Login\LoginPdoService($this->getPdo());
	}
	public function getStundenPlanPdoService()
	{
		return new Service\Stundenplan\StundenplanPdoService($this->getPdo());
	}
	public function getUserService()
	{
		return new Service\User\UserPdoService($this->getPdo());
	}
}