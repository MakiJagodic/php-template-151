<?php

namespace MakiJagodic\Controller;
use MakiJagodic\SimpleTemplateEngine;
use MakiJagodic\Service\Stundenplan\StundenplanService;
use MakiJagodic\Service\User\UserService;

class IndexController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, StundenplanService $stundenplanService, UserService $userService)
  {
     $this->template = $template;
     $this->stundenplanService = $stundenplanService;
     $this->userService = $userService;
  }

  public function homepage() {
  	if (!empty($_SESSION["email"]))
  	{
  		
  		echo $this->template->render("index.html.php", [
  			"lektionen" => $this->stundenplanService->getLektionen(),
  				"faecher" => $this->stundenplanService->getFach(),
  				"rolleId" => $this->userService->getRolleFromUser($_SESSION["email"])
  		]);
  	}
  	else
  	{
  		header("Location: /login");
  	}
  }
  public function edituser()
  {
  	echo $this->template->render("edituser.html.php", [
  			"users" => $this->userService->getUser()
  	]);
  }
  
  public function editplan()
  {
  	echo $this->template->render("editplan.html.php", [
  			"lektionen" => $this->stundenplanService->getLektionen(),
  				"faecher" => $this->stundenplanService->getFach()
  	]);
  }
  
}
