<?php
namespace MakiJagodic\Service\Login;

use MakiJagodic\Service\Login\LoginService;


class LoginPdoService implements LoginService
{
	private $pdo;
	public function __construct(\Pdo $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function edituser($email, $password)
	{
		$stmt = $this->pdo->prepare("Update user Set password=? WHERE email=?");
		$stmt->bindValue(1, $password);
		$stmt->bindValue(2, $email);
		
		$stmt->execute();
		return $stmt->rowCount() == 1;
	}
	
	public function register($email, $password)
	{
		$stmt = $this->pdo->prepare("INSERT INTO user (email, password, rolleid) VALUES (?, ?, 1)");
		$stmt->bindValue(1, $email);
		$stmt->bindValue(2, $password);
		$stmt->execute();
	}
	
	public function authenticateregistration($email)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email=?");
		$stmt->bindValue(1, $email);
		$stmt->execute();
			
		return $stmt->rowCount() == 1;
	}
	
	public function authenticate($email, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email=? AND password=?");
		$stmt->bindValue(1, $email);
		$stmt->bindValue(2, $password);
		$stmt->execute();
		 
		return $stmt->rowCount() == 1;
	}
}