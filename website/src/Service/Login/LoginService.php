<?php
namespace MakiJagodic\Service\Login;

interface LoginService
{
	public function authenticate($username, $password);
}