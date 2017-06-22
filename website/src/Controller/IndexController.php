<?php

namespace MakiJagodic\Controller;

use MakiJagodic\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(\Twig_Environment $template)
  {
     $this->template = $template;
  }

  public function homepage() {
  	if ($_SESSION["email"] != null)
  	{
  		echo $this->template->render("index.html.php");
  	}
    else 
    {
    	echo $this->template->render("login.html.php");
    }
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
  
  public function edituser(array $data)
  {
  	 
  	$this->loginService->edituser($data["email"], $data["password"]);
  	$this->template->render("edituser.html.php");
  }
  
  public function editplan()
  {
  	 
  }
  
}
