<?php
namespace MakiJagodic\Service\Login;

interface LoginService
{
	public function authenticate($email, $password);
	
	public function authenticateregistration($email);
	
	public function register($email, $password);
	
	public function edituser($email, $password);
}