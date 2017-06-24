<?php

namespace MakiJagodic\Controller;
use MakiJagodic\SimpleTemplateEngine;
use MakiJagodic\Service\Stundenplan\StundenplanService;

class IndexController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(\Twig_Environment $template, StundenplanService $stundenplanService)
  {
     $this->template = $template;
     $this->stundenplanService = $stundenplanService;
  }

  public function homepage() {
  	if (!empty($_SESSION["email"]))
  	{
  		echo $this->template->render("index.html.php", [
  			"lektionen" => $this->stundenplanService->getLektionen()
  		]);
  	}
  	else
  	{
  		header("Location: /login");
  	}
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
  
  public function edituser(array $data)
  {
  	if ($this->loginService->edituser($data["email"], $data["password"]))
  	{
  		
  		$this->template->render("edituser.html.php");
  	}
  	else 
  	{
  		
  	}
  	
  }
  
  public function editplan()
  {
  	 
  }
  
}
