<?php

namespace MakiJagodic\Controller;

use MakiJagodic\SimpleTemplateEngine;
use MakiJagodic\Service\Login\LoginService;

class LoginController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  private $loginService;
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, LoginService $loginService)
  {
     $this->template = $template;
     $this->loginService = $loginService;
  }

  public function showLogin()
  {
  	session_regenerate_id();
  	echo $this->template->render("login.html.php");
  }
  
  public function register(array $data)
  {
  	if (!array_key_exists("email", $data) OR !array_key_exists("password", $data))
  	{
  		$this->showLogin();
  		return;
  	}
  	if($this->loginService->authenticateregistration($data["email"]))
  	{
  		$this->showLogin();
  		return;
  	}
  	else
  	{
  		echo $this->template->render("login.html.php",
  				["email" => $data["email"]]
  				);
  	}
  	$this->loginService->register($data["email"], $data["password"]);
  	
  }
  
  public function login(array $data)
  {
  	if (isset($_POST['register']))
  	{
  		$this->register($data);
  		return;
  	}
  	if (isset($_POST['forgotpw']))
  	{
  		echo $this->template->render("pwaendern.html.php",
  				["email" => $data["email"]]
  				);
  		return;
  	}
  	if (!array_key_exists("email", $data) OR !array_key_exists("password", $data))
  	{
  		$this->showLogin();
  		return;
  	}
  	
  	if($this->loginService->authenticate($data["email"], $data["password"]))
  	{
  		//$_SESSION["email"] = $email;
  		header("Location: /");
  		// session_regenerate_id();
  	}
  	else
  	{
  		echo $this->template->render("login.html.php", 
  				["email" => $data["email"]]
  			);
  	}
  }
}
